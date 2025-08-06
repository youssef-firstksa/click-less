<?php

namespace App\Models;

use App\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['title', 'slug'];

    protected static function booted()
    {
        static::creating(function ($productTranslation) {
            $productTranslation->slug = SlugService::make($productTranslation->title, '-', $productTranslation->locale, function ($slug) use ($productTranslation) {
                return ProductTranslation::where('slug', $slug)
                    ->where('locale', $productTranslation->locale)
                    ->exists();
            });
        });

        static::updating(function ($productTranslation) {
            if ($productTranslation->isDirty('title')) {
                $productTranslation->slug = SlugService::make($productTranslation->title, '-', $productTranslation->locale, function ($slug) use ($productTranslation) {
                    return ProductTranslation::query()
                        ->where('slug', $slug)
                        ->where('locale', $productTranslation->locale)
                        ->whereNot('id', $productTranslation->id)
                        ->exists();
                });
            }
        });
    }
}
