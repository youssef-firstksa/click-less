<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (PermissionEnum::cases() as $case) {
            Permission::firstOrCreate(
                [
                    'name' => $case->value,
                    'guard_name' => 'web'
                ],
                [
                    'en' => [
                        'title' => __("permissions.{$case->value}", locale: "en"),
                    ],
                    'ar' => [
                        'title' => __("permissions.{$case->value}", locale: "ar"),
                    ],
                ]
            );
        }

        $superAdminRole = Role::firstOrCreate(
            [
                'name' => 'super-admin',
            ],
            [
                'en' => [
                    'title' => 'Super Admin',
                ],
                'ar' => [
                    'title' => 'المشرف الأعلى',
                ],
            ]
        );

        $adminRole = Role::firstOrCreate(
            [
                'name' => 'admin',
            ],
            [
                'en' => [
                    'title' => 'Admin',
                ],
                'ar' => [
                    'title' => 'مشرف',
                ],
            ]
        );

        $agentRole = Role::firstOrCreate(
            [
                'name' => 'agent',
            ],
            [
                'en' => [
                    'title' => 'Agent',
                ],
                'ar' => [
                    'title' => 'موظف خدمة عملاء',
                ],
            ]
        );

        $superAdminRole->givePermissionTo(PermissionEnum::allPermissions());
        $adminRole->givePermissionTo([
            ...PermissionEnum::rolePermissions(),
            ...PermissionEnum::userPermissions(),
        ]);
        $agentRole->givePermissionTo(PermissionEnum::ACCESS_AGENT);
    }
}
