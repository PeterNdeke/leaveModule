<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Upline Manager',
            'email' => 'uplinemanager@gmail.com',
            'role' => 'manager',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jack Baur',
            'email' => 'jackbaur@gmail.com',
            'role' => 'employer',
            'password' => bcrypt('secret'),
        ]);
    }
}
