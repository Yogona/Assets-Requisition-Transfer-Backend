<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name'              => 'COMPUTER SYSTEMS AND MATHEMATICS',
            "abbreviation"      => "CSM",
            'description'       => '',
            "department_number" => "01",
            "building_number"   => "01",
        ]);

        Department::create([
            'name'              => 'GEOSPACIAL SCIENCE AND TECHNOLOGY',
            "abbreviation"      => "GST",
            'description'       => '',
            "department_number" => "02",
            "building_number"   => "01"
        ]);

        Department::create([
            'name'              => 'DEPARTMENT OF BUSNESS STUDIES',
            "abbreviation"      => "DBS",
            'description'       => '',
            "department_number" => "03",
            "building_number"   => "01"
        ]);
    }
}
