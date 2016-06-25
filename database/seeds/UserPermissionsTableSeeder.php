<?php

use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('user_permissions')->insert([
        ['users_id' => '1','permissions_id' => '1','status' => 'on'],
        ['users_id' => '1','permissions_id' => '2','status' => 'on'],
        ['users_id' => '1','permissions_id' => '3','status' => 'on'],
        ['users_id' => '1','permissions_id' => '4','status' => 'on'],
        ['users_id' => '1','permissions_id' => '5','status' => 'on'],
        ['users_id' => '1','permissions_id' => '6','status' => 'on'],
        ['users_id' => '1','permissions_id' => '7','status' => 'on'],
        ['users_id' => '1','permissions_id' => '8','status' => 'on'],
        ['users_id' => '1','permissions_id' => '9','status' => 'on'],
        ['users_id' => '1','permissions_id' => '10','status' => 'on'],
        ['users_id' => '1','permissions_id' => '11','status' => 'on'],
        ['users_id' => '1','permissions_id' => '12','status' => 'on'],
        ['users_id' => '1','permissions_id' => '13','status' => 'on'],
        ['users_id' => '1','permissions_id' => '14','status' => 'on'],
        ['users_id' => '1','permissions_id' => '15','status' => 'on'],
        ['users_id' => '1','permissions_id' => '16','status' => 'on'],
        ['users_id' => '1','permissions_id' => '17','status' => 'on'],        
        ['users_id' => '1','permissions_id' => '18','status' => 'on'],
        ['users_id' => '1','permissions_id' => '19','status' => 'on'],      
        ['users_id' => '1','permissions_id' => '20','status' => 'on']      
        ]);
        
        
        
        
    }
}
