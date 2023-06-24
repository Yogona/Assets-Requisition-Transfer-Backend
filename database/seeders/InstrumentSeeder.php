<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instrument;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instrument::create([
            "instrument_code"   => "ARU/01/01/Samsung/1687639487",
            "description"       => "Mouse",
            "unit"              => "PCs"
        ]);
    }
}
