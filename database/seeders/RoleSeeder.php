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
            "name" => "admin",
            "description" => ""
        ]);

        Role::create([
            "name" => "hod",
            "description" => ""
        ]);

        Role::create([
            "name" => "hpmu",
            "description" => ""
        ]);

        Role::create([
            "name" => "assets custodian",
            "description" => ""
        ]);

        Role::create([
            "name" => "supplies officer",
            "description" => ""
        ]);

        Role::create([
            "name" => "financial officer",
            "description" => ""
        ]);

        Role::create([
            "name" => "staff",
            "description" => ""
        ]);
    }
}
