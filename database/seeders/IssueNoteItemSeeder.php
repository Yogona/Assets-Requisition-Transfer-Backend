<?php

namespace Database\Seeders;

use App\Models\IssueNoteItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueNoteItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IssueNoteItem::create([
            "item_code" => "ARU/01/01/Samsung/1687639487",
            "issue_note" => "IN1686191983",
            "item_description" => "Samsung",
            "issue_unit" => "pcs",
            "requested" => 5,
        ]);
    }
}
