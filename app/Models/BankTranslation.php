<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\SlugService;

class BankTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['title', 'slug', 'description'];

    protected static function booted()
    {
        static::creating(function ($bankTranslation) {
            $bankTranslation->slug = SlugService::make($bankTranslation->title, '-', $bankTranslation->locale, function ($slug) use ($bankTranslation) {
                return BankTranslation::where('slug', $slug)
                    ->where('locale', $bankTranslation->locale)
                    ->exists();
            });
        });

        static::updating(function ($bankTranslation) {
            if ($bankTranslation->isDirty('title')) {
                $bankTranslation->slug = SlugService::make($bankTranslation->title, '-', $bankTranslation->locale, function ($slug) use ($bankTranslation) {
                    return BankTranslation::query()
                        ->where('slug', $slug)
                        ->where('locale', $bankTranslation->locale)
                        ->whereNot('id', $bankTranslation->id)
                        ->exists();
                });
            }
        });
    }
}
