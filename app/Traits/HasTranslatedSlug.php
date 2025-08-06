<?php

namespace App\Traits;

use App\Services\SlugService;
use Exception;
use Illuminate\Support\Facades\Schema;

trait HasTranslatedSlug
{
    protected static function bootHasTranslatedSlug()
    {
        if (!defined(static::class . '::SLUG_SOURCE')) {
            throw new Exception("You must define the SLUG_SOURCE constant in " . static::class);
        }

        $model = new static();

        if (!Schema::hasColumn($model->getTable(), static::SLUG_SOURCE)) {
            throw new Exception("The SLUG_SOURCE '" . static::SLUG_SOURCE . "' is not a column in the '" . $model->getTable() . "' table.");
        }

        static::creating(function ($model) {
            $slugSource = $model->getSlugSourceColumn();

            $model->slug = SlugService::make(
                $model->{$slugSource},
                '-',
                $model->locale,
                fn($slug) => $model->newQuery()
                    ->where('slug', $slug)
                    ->where('locale', $model->locale)
                    ->exists()
            );
        });

        static::updating(function ($model) {
            $slugSource = $model->getSlugSourceColumn();

            if ($model->isDirty($slugSource)) {
                $model->slug = SlugService::make(
                    $model->{$slugSource},
                    '-',
                    $model->locale,
                    fn($slug) => $model->newQuery()
                        ->where('slug', $slug)
                        ->where('locale', $model->locale)
                        ->where('id', '!=', $model->id)
                        ->exists()
                );
            }
        });
    }

    protected function getSlugSourceColumn(): string
    {
        return defined('static::SLUG_SOURCE') ? static::SLUG_SOURCE : 'title';
    }
}
