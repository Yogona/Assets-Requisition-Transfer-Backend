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
        Schema::create('departments_instruments', function (Blueprint $table) {
            $table->id();
            $table->string("instrument");
            $table->unsignedInteger("quantity");
            $table->unsignedBigInteger("department");
            $table->timestamps();

            // $table->foreign("instrument")->references("instrument_code")->on("instruments");
            $table->foreign("department")->references("id")->on("departments");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments_instruments');
    }
};
