<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\SlugService;
use App\Traits\HasTranslatedSlug;

class BankTranslation extends Model
{
    use HasFactory, HasTranslatedSlug;

    public $timestamps = false;

    public $fillable = ['title', 'slug', 'description'];

    public const SLUG_SOURCE = 'title';
}
