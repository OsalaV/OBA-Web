<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin@$ds'),
            'contact' => 'xxxxxxxxxx',
            'role' => 'superadmin',
            'status' => 'on',
        ]);
    }
}
