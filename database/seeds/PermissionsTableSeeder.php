<?php

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
        DB::table('permissions')->insert([
        ['permission' => 'DASHBOARD','priority' => 'default','privilages' => 'Allows to view dashboard'],
        ['permission' => 'POSTS','priority' => 'default','privilages' => 'Allows to view and edit posts'],
        ['permission' => 'EVENTS','priority' => 'default','privilages' => 'Allows to view and edit events'],
        ['permission' => 'PROJECTS','priority' => 'default','privilages' => 'Allows to view and edit projects'],
        ['permission' => 'MEMBERS','priority' => 'default','privilages' => 'Allows to view and edit members'],
        ['permission' => 'GUESTS','priority' => 'high','privilages' => 'Allows to view guest users'],
        ['permission' => 'TICKETS','priority' => 'high','privilages' => 'Allows to view ticket transactions'],
        ['permission' => 'MESSAGES','priority' => 'default','privilages' => 'Allows to view user messages'],
        ['permission' => 'ACTIVITIES','priority' => 'high','privilages' => 'Allows to view user activities'],
        ['permission' => 'SETTINGS','priority' => 'default','privilages' => 'Allows to view settings'],
        ['permission' => 'GENERAL SETTINGS','priority' => 'default','privilages' => 'Allows to view and edit general settings'],
        ['permission' => 'IMAGE SLIDER','priority' => 'default','privilages' => 'Allows to view and edit image slider'],
        ['permission' => 'BRANCHES','priority' => 'default','privilages' => 'Allows to view and edit branches'],
        ['permission' => 'RESOURCES','priority' => 'default','privilages' => 'Allows to view and edit resources'],
        ['permission' => 'DESIGNATIONS','priority' => 'high','privilages' => 'Allows to view and edit member designations'],
        ['permission' => 'ADMINS','priority' => 'high','privilages' => 'Allows to view and edit admin'],
        ['permission' => 'ADMIN PERMISSIONS','priority' => 'high','privilages' => 'Allows to view and edit admin permissions'],
        ['permission' => 'DELETE','priority' => 'default','privilages' => 'Allows to delete records and resources'],
        ]);
        
        
    }
}
