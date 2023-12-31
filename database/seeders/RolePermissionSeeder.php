<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'super-admin']);

        $permissions = [
            [
                'prefix' => 'user',
                'name' => 'view user',
            ],
            [
                'prefix' => 'user',
                'name' => 'add user',
            ],
            [
                'prefix' => 'user',
                'name' => 'edit user',
            ],
            [
                'prefix' => 'user',
                'name' => 'delete user',
            ],
            [
                'prefix' => 'role',
                'name' => 'view role',
            ],
            [
                'prefix' => 'role',
                'name' => 'add role',
            ],
            [
                'prefix' => 'role',
                'name' => 'edit role',
            ],
            [
                'prefix' => 'role',
                'name' => 'delete role',
            ],
            [
                'prefix' => 'product',
                'name' => 'view product',
            ],
            [
                'prefix' => 'product',
                'name' => 'add product',
            ],
            [
                'prefix' => 'product',
                'name' => 'edit product',
            ],
            [
                'prefix' => 'product',
                'name' => 'delete product',
            ],
            [
                'prefix' => 'color',
                'name' => 'view color',
            ],
            [
                'prefix' => 'color',
                'name' => 'add color',
            ],
            [
                'prefix' => 'color',
                'name' => 'edit color',
            ],
            [
                'prefix' => 'color',
                'name' => 'delete color',
            ],
            [
                'prefix' => 'attribute',
                'name' => 'view attribute',
            ],
            [
                'prefix' => 'attribute',
                'name' => 'add attribute',
            ],
            [
                'prefix' => 'attribute',
                'name' => 'edit attribute',
            ],
            [
                'prefix' => 'attribute',
                'name' => 'delete attribute',
            ],
        ];
        foreach ($permissions as $item) {
            Permission::create($item);
        }
        $role->syncPermissions(Permission::all());

        $user = User::first();
        $user->assignRole($role);

    }
}
