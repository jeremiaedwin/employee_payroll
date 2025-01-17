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
        Schema::create('position_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id');
            $table->decimal('amount', total: 8, places: 2);
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_salaries');
    }
};
