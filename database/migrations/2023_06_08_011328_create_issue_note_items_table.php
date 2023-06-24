<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issue_note_items', function (Blueprint $table) {
            $table->string("item_code");
            $table->string("issue_note");
            $table->string('item_description');
            $table->string("issue_unit");
            $table->unsignedInteger("requested");
            $table->unsignedInteger("supplied")->nullable();
            $table->string("unit_price")->nullable();
            $table->unsignedFloat("total_value")->nullable();
            $table->boolean("registered")->default(false);
            $table->timestamps();

            $table->primary("item_code");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_note_items');
    }
};
