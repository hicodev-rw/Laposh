<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create-room']);
        Permission::create(['name' => 'update-room']);
        Permission::create(['name' => 'edit-room']);
        Permission::create(['name' => 'delete-room']);
        Permission::create(['name' => 'view-room']);
        Permission::create(['name' => 'dashboard']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'view-user']);

        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'update-category']);
        Permission::create(['name' => 'edit-category']);
        Permission::create(['name' => 'delete-category']);
        Permission::create(['name' => 'view-category']);

        Permission::create(['name' => 'check-in']);
        Permission::create(['name' => 'check-out']);
        Permission::create(['name' => 'view-reservation']);
        Permission::create(['name' => 'cancel-reservation']);
        Permission::create(['name' => 'extend-reservation']);

        Permission::create(['name' => 'view-payment']);
        Permission::create(['name' => 'check-paymemt']);
        Permission::create(['name' => 'generate-report']);

        $adminRole = Role::create(['name' => 'Administrator']);
        $accountantRole = Role::create(['name' => 'Accountant']);
        $roomOperatorRole = Role::create(['name' => 'Room-operator']);
        $receptionRole = Role::create(['name' => 'Receptionist']);
        $clientRole = Role::create(['name' => 'Client']);

        $adminRole->givePermissionTo(Permission::all());

        $accountantRole->givePermissionTo([  
            'view-payment',
            'view-room',
            'check-paymemt',
            'generate-report'
            ]);
        $roomOperatorRole->givePermissionTo([
                'view-room',
                'view-category',
                'check-in',
                'check-out',
                'view-reservation',
                'extend-reservation'
                ]);
        $receptionRole->givePermissionTo([
            'view-reservation',
            'view-room',
                    ]);
    }
}