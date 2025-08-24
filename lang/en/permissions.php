<?php

use App\Enums\PermissionEnum;

return [
    ...array_combine(
        array_map(fn($case) => $case->value, PermissionEnum::cases()),
        array_map(function ($case) {
            return ucwords(str_replace(['_', '-'], ' ', $case->value));
        }, PermissionEnum::cases())
    ),
    'groups' => [
        'platform' => 'Platform',
        'dashboard' => 'Dashboard',
        'agent' => 'Agent',
        'role' => 'Roles',
        'user' => 'Users',
        'bank' => 'Banks',
        'product' => 'Products',
        'section' => 'Sections',
        'article' => 'Articles',
        'article_note_category' => 'Articles Notes Category',
        'article_note' => 'Articles Notes',
        'notification' => 'Notifications',
    ],
];
