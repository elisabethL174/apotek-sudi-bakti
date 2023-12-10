<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "email_verified_at" => null,
            "password" => Hash::make("11111111"),
            "usertype" => "admin",
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'), 
        ]);
    }
}
