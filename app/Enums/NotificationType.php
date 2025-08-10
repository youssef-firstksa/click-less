<?php

namespace App\Enums;

enum NotificationType: string
{
    case SUCCESS = "success";
    case INFO = "info";
    case WARNING = "warning";
    case ERROR = "error";

    public function getLabel(): string
    {
        return ucfirst($this->value);
    }

    public static function labels(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => __("dashboard.general.{$case->value}")
        ])->toArray();
    }
}
