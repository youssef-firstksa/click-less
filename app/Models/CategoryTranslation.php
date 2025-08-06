<?php

namespace App\Models;

use App\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['title', 'slug'];

    protected static function booted()
    {
        static::creating(function ($categoryTranslation) {
            $categoryTranslation->slug = SlugService::make($categoryTranslation->title, '-', $categoryTranslation->locale, function ($slug) use ($categoryTranslation) {
                return CategoryTranslation::where('slug', $slug)
                    ->where('locale', $categoryTranslation->locale)
                    ->exists();
            });
        });

        static::updating(function ($categoryTranslation) {
            if ($categoryTranslation->isDirty('title')) {
                $categoryTranslation->slug = SlugService::make($categoryTranslation->title, '-', $categoryTranslation->locale, function ($slug) use ($categoryTranslation) {
                    return CategoryTranslation::query()
                        ->where('slug', $slug)
                        ->where('locale', $categoryTranslation->locale)
                        ->whereNot('id', $categoryTranslation->id)
                        ->exists();
                });
            }
        });
    }
}
