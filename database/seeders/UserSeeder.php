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

        User::create([//CSM HOD
            "first_name" => "Jimson",
            "last_name" => "Chaki",
            "username" => "csmhod@localhost",
            "email" => "csmhod@localhost",
            "phone" => "255711223345",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 2,
            "department" => 1
        ]);

        User::create([//GST HOD
            "first_name" => "Boaz",
            "last_name" => "Mwakyembe",
            "username" => "gsthod@localhost",
            "email" => "gsthod@localhost",
            "phone" => "255711223352",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 2,
            "department" => 2
        ]);

        User::create([ //DBS HOD
            "first_name" => "Joram",
            "last_name" => "Simon",
            "username" => "dbshod@localhost",
            "email" => "dbshod@localhost",
            "phone" => "255711223356",
            "gender" => "M",
            "password" => Hash::make("1234"),
            "role" => 2,
            "department" => 3
        ]);

        User::create([
            "first_name" => "Nyler",
            "last_name" => "Harper",
            "username" => "dean@localhost",
            "email" => "dean@localhost",
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
            "first_name" => "CSM",
            "last_name" => "Staff",
            "username" => "csmstaff@localhost",
            "email" => "csmstaff@localhost",
            "phone" => "255711223350",
            "gender" => "F",
            "password" => Hash::make("1234"),
            "role" => 7,
            "department" => 1
        ]);

        User::create([
            "first_name" => "GST",
            "last_name" => "Staff",
            "username" => "gststaff@localhost",
            "email" => "gststaff@localhost",
            "phone" => "255711223354",
            "gender" => "F",
            "password" => Hash::make("1234"),
            "role" => 7,
            "department" => 2
        ]);

        User::create([
            "first_name" => "DBS",
            "last_name" => "Staff",
            "username" => "dbsstaff@localhost",
            "email" => "dbsstaff@localhost",
            "phone" => "255711223355",
            "gender" => "F",
            "password" => Hash::make("1234"),
            "role" => 7,
            "department" => 3
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
