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

    public static function labels(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => __("admin.general.{$case->value}")
        ])->toArray();
    }
}
