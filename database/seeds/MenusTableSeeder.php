<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'slug' => 'main',
            'name' => 'Main',
            'is_system' => true,
        ]);

        Menu::create([
            'slug' => 'navigation',
            'name' => 'Navigation',
            'is_system' => true,
        ]);

        $menu = Menu::find(2);
        $menu->items()->createMany([
            [
                'slug' => 'home',
                'name' => 'Home',
                'route' => 'home',
                'order' => 1,
            ],
            [
                'slug' => 'contact',
                'name' => 'Contact',
                'route' => 'contact',
                'order' => 2,
            ],
        ]);

        $menu = Menu::find(1);
        $menu->items()->createMany([
            [
                'slug' => 'dashboard',
                'name' => 'Dashboard',
                'route' => 'home',
                'icon' => 'tachometer-alt',
                'order' => -999,
            ],
            [
                'slug' => 'menu-manage',
                'name' => 'Menu Management',
                'icon' => 'sitemap',
                'is_system' => true,
                'order' => 4,
            ],
            [
                'slug' => 'menu',
                'name' => 'Menu',
                'route' => 'menus.index',
                'parent_id' => 4,
                'is_system' => true,
                'order' => 5,
            ],
            [
                'slug' => 'menuitem',
                'name' => 'Menu Item',
                'route' => 'menuitems.index',
                'parent_id' => 4,
                'is_system' => true,
                'order' => 6,
            ],
            [
                'slug' => 'user-manage',
                'name' => 'User Management',
                'icon' => 'users',
                'is_system' => true,
                'order' => 7,
            ],
            [
                'slug' => 'user',
                'name' => 'User',
                'route' => 'users.index',
                'parent_id' => 7,
                'is_system' => true,
                'order' => 8,
            ],
            [
                'slug' => 'role',
                'name' => 'Role',
                'route' => 'roles.index',
                'parent_id' => 7,
                'is_system' => true,
                'order' => 9,
            ],
            [
                'slug' => 'permission',
                'name' => 'Permission',
                'route' => 'permissions.index',
                'parent_id' => 7,
                'is_system' => true,
                'order' => 10,
            ],
            [
                'slug' => 'group',
                'name' => 'Group',
                'route' => 'groups.index',
                'parent_id' => 7,
                'is_system' => true,
                'order' => 11,
            ],
            [
                'slug' => 'system-manage',
                'name' => 'System Management',
                'icon' => 'cogs',
                'is_system' => true,
                'order' => 12,
            ],
            [
                'slug' => 'password-change',
                'name' => 'Change Password',
                'route' => 'passwords.change',
                'parent_id' => 12,
                'is_system' => true,
                'order' => 13,
            ],
            [
                'slug' => 'setting',
                'name' => 'Setting',
                'route' => 'settings.index',
                'parent_id' => 12,
                'is_system' => true,
                'order' => 14,
            ],
            [
                'slug' => 'log',
                'name' => 'Log',
                'route' => 'logs.index',
                'parent_id' => 12,
                'is_system' => true,
                'order' => 15,
            ],
        ]);
    }
}
