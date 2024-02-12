<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // DB::table('users')->insert([[
        //     'name' => 'Mohit Pandey',
        //     'email' => 'mohit@gmail.com',
        //     'notification' => false,
        //     'password' => Hash::make('password'),
        // ], [
        //     'name' => 'Rohit Pandey',
        //     'email' => 'rohit@gmail.com',
        //     'notification' => false,
        //     'password' => Hash::make('password'),
        // ], [
        //     'name' => 'Sohit Pandey',
        //     'email' => 'sohit@gmail.com',
        //     'notification' => false,
        //     'password' => Hash::make('password'),
        // ], [
        //     'name' => 'Ravi Pandey',
        //     'email' => 'ravi@gmail.com',
        //     'notification' => false,
        //     'password' => Hash::make('password'),
        // ]]);
    }
}
