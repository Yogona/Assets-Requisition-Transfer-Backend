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
        User::create([//Admin
            "first_name" => "System",
            "last_name" => "Admin",
            "username" => "admin@localhost",
            "email" => "admin@localhost",
            "phone" => "255711223344",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 1,
        ]);

        User::create([//HOD
            "first_name" => "John",
            "last_name" => "Nolan",
            "username" => "hod@localhost",
            "email" => "hod@localhost",
            "phone" => "255711223345",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 2,
            "department" => 1
        ]);

        User::create([ //HOD
            "first_name" => "John2",
            "last_name" => "Nolan2",
            "username" => "hod2@localhost",
            "email" => "hod2@localhost",
            "phone" => "255711223352",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 2,
            "department" => 2
        ]);

        User::create([
            "first_name" => "Nyler",
            "last_name" => "Harper",
            "username" => "hpmu@localhost",
            "email" => "hpmu@localhost",
            "phone" => "255711223346",
            "gender" => "F",
            "password" => Hash::make("1234"),
            "role" => 3,
            "department" => 1
        ]);

        User::create([
            "first_name" => "Tim",
            "last_name" => "Bradford",
            "username" => "custodian@localhost",
            "email" => "custodian@localhost",
            "phone" => "255711223347",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 4,
            "department" => 1
        ]);

        User::create([
            "first_name" => "Lucy",
            "last_name" => "Chen",
            "username" => "supplies@localhost",
            "email" => "supplies@localhost",
            "phone" => "255711223348",
            "gender" => "F",
            "password" => Hash::make("1234"),
            "role" => 5,
            "department" => 1
        ]);

        User::create([
            "first_name" => "Shabani",
            "last_name" => "Magesa",
            "username" => "financial@localhost",
            "email" => "financial@localhost",
            "phone" => "255711223349",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 6,
            "department" => 1
        ]);

        User::create([
            "first_name" => "Rachel",
            "last_name" => "Mwendapole",
            "username" => "staff@localhost",
            "email" => "staff@localhost",
            "phone" => "255711223350",
            "gender" => "F",
            "password" => Hash::make("1234"),
            "role" => 7,
            "department" => 1
        ]);

        User::create([
            "first_name" => "Jensen",
            "last_name" => "Kibakuli",
            "username" => "store@localhost",
            "email" => "store@localhost",
            "phone" => "255711223351",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 8,
            "department" => 1
        ]);
    }
}
