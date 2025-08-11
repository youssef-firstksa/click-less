<?php

use App\Enums\PermissionEnum;

return [
    ...array_combine(
        array_map(fn($case) => $case->value, PermissionEnum::cases()),
        array_map(fn($case) => str_replace('-', ' ', ucwords($case->value, '-')), PermissionEnum::cases())
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
        'notification' => 'Notifications',
    ],
];
