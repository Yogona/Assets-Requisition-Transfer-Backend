<?php

namespace Database\Seeders;

use App\Models\TransferRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransferRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransferRequest::create([
            "from_department"   => 1,
            "to_department"     => 2,
        ]);
    }
}
