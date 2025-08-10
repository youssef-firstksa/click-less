<?php

namespace App\Models;

use App\Traits\CommonFilters;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory, Translatable, CommonFilters;

    public $translatedAttributes = ['title'];
}
