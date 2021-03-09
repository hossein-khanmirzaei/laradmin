<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'maintenance',
            'value' => '0',
            'description' => 'System Maintenance，1-Maintenance Mode，0-Normal Mode',
        ]);
    }
}
