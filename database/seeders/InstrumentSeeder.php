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
            "instrument_code"   => "IC123456789",
            "description"       => "Mouse",
            "unit"              => "PCs"
        ]);
    }
}
