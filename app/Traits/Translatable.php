<?php

namespace App\Traits;

use Astrotomic\Translatable\Translatable as AstrotomicTranslatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait Translatable
{
    use AstrotomicTranslatable;

    public function scopeTranslatedPluck(Builder $builder, string $titleColumn = 'title')
    {
        $model = new static;
        $mainTable = $model->getTable();
        $translationTable = Str::singular($mainTable) . '_translations';

        $locale = app()->getLocale();

        $query = $builder->join($translationTable, function ($join) use ($mainTable, $translationTable, $locale) {
            $join->on("{$translationTable}." . Str::singular($mainTable) . "_id", '=', "{$mainTable}.id")
                ->where("{$translationTable}.locale", $locale);
        })
            ->select("{$mainTable}.id", "{$translationTable}.{$titleColumn}");

        if (Schema::hasColumn($mainTable, 'sort_order')) {
            $query->orderBy("{$mainTable}.sort_order", 'asc');
        }

        return $query->pluck("{$translationTable}.{$titleColumn}", "{$mainTable}.id");
    }
}
