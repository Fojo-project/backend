<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => UserRole::SUPER_ADMIN->value, 'guard_name' => 'api']);
        Role::create(['name' => UserRole::ADMIN->value, 'guard_name' => 'api']);
        Role::create(['name' => UserRole::LEARNER->value, 'guard_name' => 'api']);
        Role::create(['name' => UserRole::INSTRUCTOR->value, 'guard_name' => 'api']);
        $this->command->info("Roles have been seeded completely.");
    }
}
