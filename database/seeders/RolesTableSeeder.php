<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'role' => 'Admin',
            ],
            [
                'id'    => 2,
                'role' => 'Student',
            ],
            [
                'id'    => 3,
                'role' => 'Partner',
            ],
        ];

        Role::insert($roles);
    }
}
