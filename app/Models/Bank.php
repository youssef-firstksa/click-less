<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'slug', 'details'];
    protected $fillable = ['color', 'logo', 'img', 'ai_key', 'status'];
}
