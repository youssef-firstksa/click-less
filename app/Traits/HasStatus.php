<?php

namespace App\Traits;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;

trait HasStatus
{
    public function scopeWhereActivated(Builder $builder)
    {
        $builder->where('status', Status::ACTIVATED);
    }

    public function scopeWhereDisabled(Builder $builder)
    {
        $builder->where('status', Status::DISABLED);
    }

    public function scopeOrWhereActivated(Builder $builder)
    {
        $builder->orWhere('status', Status::ACTIVATED);
    }

    public function scopeOrWhereDisabled(Builder $builder)
    {
        $builder->orWhere('status', Status::DISABLED);
    }

    public function scopeWhereNotActivated(Builder $builder)
    {
        $builder->whereNot('status', Status::ACTIVATED);
    }

    public function scopeWhereNotDisabled(Builder $builder)
    {
        $builder->whereNot('status', Status::DISABLED);
    }

    public function scopeOrWhereNotActivated(Builder $builder)
    {
        $builder->orWhereNot('status', Status::ACTIVATED);
    }

    public function scopeOrWhereNotDisabled(Builder $builder)
    {
        $builder->orWhereNot('status', Status::DISABLED);
    }

    public function scopeWhereStatus(Builder $builder, string | Status $status)
    {
        $builder->where('status', $status);
    }

    public function scopeWhereStatusNot(Builder $builder, string | Status $status)
    {
        $builder->whereNot('status', $status);
    }

    public function scopeWhereStatusIn(Builder $builder, array $statusOptions)
    {
        $builder->whereIn('status', $statusOptions);
    }

    public function scopeWhereStatusNotIn(Builder $builder, array $statusOptions)
    {
        $builder->whereNotIn('status', $statusOptions);
    }
}
