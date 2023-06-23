<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "name" => "Admin",
            "description" => ""
        ]);

        Role::create([
            "name" => "HOD",
            "description" => ""
        ]);

        Role::create([
            "name" => "Dean",
            "description" => ""
        ]);

        Role::create([
            "name" => "Assets Custodian",
            "description" => ""
        ]);

        Role::create([
            "name" => "Supplies Officer",
            "description" => ""
        ]);

        Role::create([
            "name" => "Financial Officer",
            "description" => ""
        ]);

        Role::create([
            "name" => "Staff",
            "description" => ""
        ]);

        Role::create([
            "name" => "Store Officer",
            "description" => ""
        ]);
    }
}
