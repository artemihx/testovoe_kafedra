<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // User::factory(10)->create();
        $role = Role::create(['name' => 'admin']);

        $user = User::factory()->create([
            'name' => 'admin',
            'surname' => 'pozd',
            'email' => 'admin@shop.ru',
            'password' => 'QWEasd123'
        ]);
        $user->assignRole($role);
        $user->save();

        $user = User::factory()->create([
            'name' => 'user',
            'surname' => 'pozd',
            'email' => 'user@shop.ru',
            'password' => 'password'
        ]);
        $user->save();

    }
}
