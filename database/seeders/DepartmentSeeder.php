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
            'name'          => 'COMPUTER SYSTEMS AND MATHEMATICS',
            "abbreviation"  => "CSM",
            'description'   => '',
        ]);

        Department::create([
            'name'          => 'GEOSPACIAL SCIENCE AND TECHNOLOGY',
            "abbreviation"  => "GST",
            'description'   => '',
        ]);

        Department::create([
            'name'          => 'DEPARTMENT OF BUSNESS STUDIES',
            "abbreviation"  => "DBS",
            'description'   => '',
        ]);
    }
}
