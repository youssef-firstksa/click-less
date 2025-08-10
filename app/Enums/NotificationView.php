<?php

namespace App\Enums;

enum NotificationView: string
{
    case POPUP = "popup";
    case TOP_BAR = "top_bar";

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
