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

class Section extends Model
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, HasStatus, LogsActivity;

    public $translatedAttributes = ['title', 'slug'];

    protected $fillable = ['product_id', 'bank_id', 'sort_order', 'status'];

    protected $casts = [
        'status' => Status::class,
    ];

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['product_id', 'bank_id', 'sort_order', 'status', 'title', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['product_id', 'bank_id', 'sort_order', 'status', 'title', 'slug'])
            ->useLogName('section_log')
            ->dontSubmitEmptyLogs();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function scopeWhereCanAccess(Builder $builder): void
    {
        $builder->whereActivated()->where('bank_id', auth()->user()->activeBank()->id);
    }
}
