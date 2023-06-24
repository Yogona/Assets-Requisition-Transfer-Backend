<?php

namespace Database\Seeders;

use App\Models\DepartmentsInstruments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsInstrumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentsInstruments::create([
            "instrument"    => "ARU/01/01/Samsung/1687639487",
            "quantity"      => 10,
            "department"    => 1
        ]);
    }
}
