<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('managers')->insert([
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' =>'manager',
        ]);
        DB::table('users')->insert([
            'name' => "user",
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role' =>'user',
            'type' =>'user',
        ]);
    }
}
