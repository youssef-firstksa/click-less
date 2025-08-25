<?php

namespace App\Models;


use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Bank extends Model implements HasMedia
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, InteractsWithMedia, HasStatus, LogsActivity;

    public $translatedAttributes = ['title', 'slug', 'description'];

    protected $fillable = ['sort_order', 'font_color', 'background_color', 'status', 'ai_key'];

    protected $casts = [
        'status' => Status::class,
    ];

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['sort_order', 'font_color', 'background_color', 'status', 'ai_key', 'title', 'slug', 'description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['sort_order', 'font_color', 'background_color', 'status', 'ai_key', 'title', 'slug', 'description'])
            ->useLogName('bank_log')
            ->dontSubmitEmptyLogs();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->useDisk('media')
            ->singleFile();

        $this
            ->addMediaCollection('logo')
            ->useDisk('media')
            ->singleFile();
    }

    public function scopeWhereCanAccessDashboard(Builder $builder): void
    {
        $builder
            ->when(
                auth()->user()->role->name !== 'super-admin',
                function (Builder $builder) {
                    $builder->whereIn('banks.id', auth()->user()->banks()->pluck('banks.id')->toArray());
                }
            );
    }
}
