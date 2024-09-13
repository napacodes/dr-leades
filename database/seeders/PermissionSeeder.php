<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'upload check']);
        Permission::create(['name' => 'page builder check']);
        Permission::create(['name' => 'menu check']);
        Permission::create(['name' => 'blog check']);
        Permission::create(['name' => 'section check']);
        Permission::create(['name' => 'service check']);
        Permission::create(['name' => 'portfolio check']);
        Permission::create(['name' => 'team check']);
        Permission::create(['name' => 'gallery check']);
        Permission::create(['name' => 'career check']);
        Permission::create(['name' => 'page check']);
        Permission::create(['name' => 'contact message check']);
        Permission::create(['name' => 'subscribe check']);
        Permission::create(['name' => 'setting check']);
        Permission::create(['name' => 'language check']);
        Permission::create(['name' => 'clear cache check']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin16@elsecolor.com',
            'password' => Hash::make('superadmin16'),
            'type' => 0,
        ]);
        $user->assignRole($role1);
    }
}
