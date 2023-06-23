<?php

namespace Database\Seeders;

use App\Models\TransferRequestAssets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransferRequestAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransferRequestAssets::create([
            "department_asset"  => 1,
            "quantity"          => 3,
            "transfer_request"  => 1
        ]);
    }
}
