<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'slug', 'description'];
    protected $fillable = ['color', 'background_color', 'status', 'logo', 'img', 'ai_key'];
}
