<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use App\Traits\CommonFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters;

    public $translatedAttributes = ['title', 'slug', 'description'];

    protected $fillable = ['color', 'background_color', 'status', 'ai_key'];

    protected $casts = [
        'status' => Status::class,
    ];
}
