<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, HasStatus, LogsActivity;

    public $translatedAttributes = ['title', 'slug'];

    protected $fillable = ['bank_id', 'sort_order', 'status'];

    protected $casts = [
        'status' => Status::class,
    ];

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['bank_id', 'sort_order', 'status', 'title', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['bank_id', 'sort_order', 'status', 'title', 'slug'])
            ->useLogName('product_log')
            ->dontSubmitEmptyLogs();
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function scopeWhereCanAccess(Builder $builder): void
    {
        $builder->whereActivated()->where('bank_id', auth()->user()->activeBank()->id);
    }

    public function scopeWhereCanAccessDashboard(Builder $builder): void
    {
        $builder
            ->when(
                auth()->user()->role->name !== 'super-admin',
                function (Builder $builder) {
                    $builder->whereIn('bank_id', auth()->user()->banks()->pluck('banks.id')->toArray());
                }
            );
    }
}
