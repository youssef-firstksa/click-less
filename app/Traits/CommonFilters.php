<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CommonFilters
{
    public function scopeCommonFilters(Builder $builder, array $filters)
    {
        if (isset($filters['search'])) {

            $builder->when(request()->get('search'), function ($query, $search) use ($filters) {
                foreach ($filters['search'] as $index => $attribute) {
                    $method = $index === 0 ? 'where' : 'orWhere';

                    if (str_starts_with(strtolower($attribute), 'translation.')) {
                        $attribute = str_replace('translation.', '', $attribute);
                        $query->{$method . 'TranslationLike'}($attribute, "%{$search}%");
                    } else {
                        $query->{$method}($attribute, 'LIKE', "%{$search}%");
                    }
                }
            });
        }

        if (isset($filters['status'])) {
            $builder->when(request()->get($filters['status']), function ($builder, $status) {
                $builder->where('status', $status);
            });
        }
    }

    public function scopeCommonPaginate(Builder $builder, array $options = [])
    {
        $orderBy = isset($options['orderBy']) ? $options['orderBy'] : 'created_at';
        $perPage = request()->get('per_page', 10);

        return $builder->orderBy($orderBy, 'DESC')->paginate($perPage);
    }
}
