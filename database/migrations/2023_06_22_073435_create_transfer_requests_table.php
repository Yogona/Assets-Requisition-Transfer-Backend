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
        Schema::create('transfer_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("from_department");
            $table->unsignedBigInteger("to_department");
            $table->unsignedBigInteger("release_sign")->nullable();
            $table->unsignedBigInteger("acceptance_sign")->nullable();
            $table->unsignedBigInteger("dean_sign")->nullable();
            $table->unsignedBigInteger("custodian_sign")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_requests');
    }
};
