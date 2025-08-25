<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleNoteCategory extends Model
{
    use CommonFilters, HasStatus, Translatable;

    protected $fillable = ['bank_id', 'status'];

    public $translatedAttributes = ['title'];

    protected $casts = [
        'status' => Status::class,
    ];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
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
