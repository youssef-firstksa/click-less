<?php

namespace App\Models;

use App\Traits\HasTranslatedSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    use HasFactory, HasTranslatedSlug;

    public $timestamps = false;

    public $fillable = ['title', 'content', 'slug'];

    public const SLUG_SOURCE = 'title';
}
