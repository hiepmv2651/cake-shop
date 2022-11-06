<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::create(['name' => 'Administrator']);
        $permission = Permission::create(['name' => 'manage tasks']);
        $permission->assignRole($adminRole);

        $user = Role::create(['name' => 'Nhan Vien']);
        $permission = Permission::create(['name' => 'edit']);
        $permission->assignRole($user);

        $adminUser = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('SecurePassword')
        ]);
        $adminUser->assignRole('Administrator');

        $user = User::factory()->create([
            'email' => 'user@admin.com',
            'password' => bcrypt('SecurePassword')
        ])->assignRole('Nhan Vien');
    }
}
