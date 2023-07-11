<?php

namespace Database\Seeders;

use App\Models\IssueNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IssueNote::create([
            "note_code"                 => "IN1686191983",
            "department"                => 1,
            // "store"                     => 1,
            "requester"                 => 7,
            "hod_signature"             => 2,
            // "store_officer_signature"   => 8
        ]);
    }
}
