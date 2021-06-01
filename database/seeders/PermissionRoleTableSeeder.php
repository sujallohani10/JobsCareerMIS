<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $all_permissions = Permission::all();

        $admin_permissions = $all_permissions->filter(function ($permission) {
            return (substr($permission->title, 0, 8) != 'student_');
        });;
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $user_permissions = $all_permissions->filter(function ($permission) {
            return (substr($permission->title, 0, 6) != 'admin_' && substr($permission->title, 0, 8) != 'student_');
        });
        Role::findOrFail(3)->permissions()->sync($user_permissions);

        $student_permission = $all_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) == 'student_';
        });
        Role::findOrFail(2)->permissions()->sync($student_permission);
    }
}
