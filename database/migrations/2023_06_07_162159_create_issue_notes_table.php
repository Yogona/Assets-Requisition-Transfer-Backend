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
        Schema::create('issue_notes', function (Blueprint $table) {
            $table->string("note_code");
            $table->unsignedBigInteger("department");
            $table->unsignedBigInteger("store");
            $table->unsignedBigInteger("requester");
            $table->unsignedBigInteger("hod_signature")->nullable();
            $table->unsignedBigInteger("store_officer_signature")->nullable();
            $table->timestamps();

            $table->primary("note_code");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_notes');
    }
};
