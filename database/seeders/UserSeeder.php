<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "first_name" => "System",
            "last_name" => "Admin",
            "username" => "admin@localhost",
            "email" => "admin@localhost",
            "phone" => "255711223344",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 1,
        ]);
    }
}
