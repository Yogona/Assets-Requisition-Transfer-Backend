<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DepartmentsInstruments;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class,
            DepartmentSeeder::class,
            StoreSeeder::class,
            UserSeeder::class,
            IssueNoteSeeder::class,
            IssueNoteItemSeeder::class,
            InstrumentSeeder::class,
            DepartmentsInstrumentsSeeder::class,
            TransferRequestSeeder::class,
            TransferRequestAssetsSeeder::class,
        ]);

        // User::factory(100)->create();
    }
}
