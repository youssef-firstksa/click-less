<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;

use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Bank extends Model implements HasMedia
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, InteractsWithMedia;

    public $translatedAttributes = ['title', 'slug', 'description'];

    protected $fillable = ['sort_order', 'font_color', 'background_color', 'status', 'ai_key'];

    protected $casts = [
        'status' => Status::class,
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->useDisk('media')
            ->singleFile();

        $this
            ->addMediaCollection('logo')
            ->useDisk('media')
            ->singleFile();
    }
}
