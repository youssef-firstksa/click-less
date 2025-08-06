<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, HasStatus;

    public $translatedAttributes = ['title', 'slug'];

    protected $fillable = ['bank_id', 'sort_order', 'status'];

    protected $casts = [
        'status' => Status::class,
    ];
}
