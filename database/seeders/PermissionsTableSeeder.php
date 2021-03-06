<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_user_access',
            ],
            [
                'id'    => 2,
                'title' => 'job_category_access',
            ],
            [
                'id'    => 3,
                'title' => 'job_access',
            ],
            [
                'id'    => 4,
                'title' => 'job_application',
            ],
            [
                'id'    => 5,
                'title' => 'admin_job_verify',
            ],
            [
                'id'    => 6,
                'title' => 'student_applied_jobs',
            ]
        ];

        DB::table('permissions')->truncate();

        Permission::insert($permissions);
    }
}
