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
        Role::create(['name' => 'super_admin', 'guard_name' => 'api']);
        Role::create(['name' => 'admin', 'guard_name' => 'api']);
        Role::create(['name' => 'learner', 'guard_name' => 'api']);
        Role::create(['name' => 'instructor', 'guard_name' => 'api']);
    }
}
