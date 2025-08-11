<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;

trait HasRoles
{
    use SpatieHasRoles;

    public function role(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->roles()->first(),
        );
    }
}
