<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Permission, Role};

// use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        $managerRole = Role::create(['name'=>'manager']);
        foreach([
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ] as $value){
            $managerRole->givePermissionTo($value);
        }

        $adminRole = Role::create(['name'=>'admin']);
        foreach([
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ] as $value){
            $adminRole->givePermissionTo($value);
        }

        $superRole = Role::create(['name'=>'super-admin']);

        $user = \App\Models\User::factory()->create([
            'name' => 'Angry Dog',
            'email' => 'doggy@my.com',
            'email_verified_at' => now(),
            'password' => bcrypt('helloDog!')
        ]);

        $user->assignRole($adminRole);

        $user = \App\Models\User::factory()->create([
            'name' => 'Tom Cat',
            'email' => 'cat@my.com',
            'email_verified_at' => now(),
            'password' => bcrypt('helloCat!')
        ]);

        $user->assignRole($managerRole);

        $user = \App\Models\User::factory()->create([
            'name' => 'Charly Root',
            'email' => 'root@my.com',
            'email_verified_at' => now(),
            'password' => bcrypt('helloRoot!')
        ]);

        $user->assignRole($superRole);

    }
}
