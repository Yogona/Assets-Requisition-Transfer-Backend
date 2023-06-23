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
        Schema::create('transfer_request_assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("department_asset");
            $table->unsignedInteger("quantity");
            $table->unsignedBigInteger("transfer_request");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_request_assets');
    }
};
