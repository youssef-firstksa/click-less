<?php

namespace App\Enums;

enum Status: string
{
    case ACTIVATED = "activated";
    case DISABLED = "disabled";

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }
}
