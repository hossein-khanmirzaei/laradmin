<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'slug' => 'home',
            'name' => 'Home',
            'action' => 'Home',
            'model' => 'navigation',
        ]);

        Permission::create([
            'slug' => 'contact',
            'name' => 'Contact',
            'action' => 'Contact',
            'model' => 'navigation',
        ]);

        Permission::create([
            'slug' => 'log-index',
            'name' => 'Log Index',
            'action' => 'Log Index',
            'model' => 'log',
        ]);

        Permission::create([
            'slug' => 'log-show',
            'name' => 'Log Show',
            'action' => 'Show',
            'model' => 'log',
        ]);

        $modules = [
            'setting', 'menu', 'menuitem', 'group', 'role', 'permission', 'user',
        ];

        $actions = [
            'create', 'edit', 'delete', 'show', 'index',
        ];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                Permission::create([
                    'slug' => $module . '-' . $action,
                    'name' => __($action) . ' ' . __($module . '.module'),
                    'action' => $action,
                    'model' => $module,
                ]);
            }
        }

        Permission::create([
            'slug' => 'password-change',
            'name' => 'Change Password',
            'action' => 'Change Password',
            'model' => 'user',
        ]);

        Permission::create([
            'slug' => 'password-reset',
            'name' => 'Reset Password',
            'action' => 'Reset Password',
            'model' => 'user',
        ]);

        Permission::create([
            'slug' => 'group-assign',
            'name' => 'Group Assignment',
            'action' => 'Assign Group',
            'model' => 'user',
        ]);

        Permission::create([
            'slug' => 'role-assign',
            'name' => 'Role Assignment',
            'action' => 'Assign Role',
            'model' => 'user',
        ]);

        Permission::create([
            'slug' => 'permission-assign',
            'name' => 'Permission Assignment',
            'action' => 'Assign Permission',
            'model' => 'role',
        ]);
    }
}
