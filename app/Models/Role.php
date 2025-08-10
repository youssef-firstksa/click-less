<?php

namespace App\Models;

use App\Traits\CommonFilters;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, Translatable, CommonFilters;

    public $translatedAttributes = ['title'];
}
