<?php

namespace App\Models;

use App\Traits\HasTranslatedSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    use HasFactory, HasTranslatedSlug;

    public $timestamps = false;

    public $fillable = ['title', 'slug'];

    public const SLUG_SOURCE = 'title';
}
