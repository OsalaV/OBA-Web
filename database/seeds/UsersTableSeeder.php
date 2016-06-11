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
            'firstname' => 'superadmin',
            'lastname'  => 'superadmin',
            'email'     => 'superadmin@gmail.com',
            'password'  => bcrypt('superadmin@$ds'),
            'month'     => 'Jan',
            'day'       => '01',
            'year'      => '2016',
            'nic'       => 'xxxxxxxxxx',
            'contact'   => 'xxxxxxxxxx',
            'role'      => 'superadmin'
        ]);
    }
}
