<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'role' => 'manager',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'role' => null,
            'password' => bcrypt('secret'),
        ]);
    }
}
