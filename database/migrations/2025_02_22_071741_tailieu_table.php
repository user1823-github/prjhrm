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
        Schema::create('tailieu', function (Blueprint $table) {
            $table->integer('maTL')->autoIncrement(); 
            $table->string('tieuDe'); // 
            $table->string('url')->nullable();
            $table->dateTime('tgBatDau');
            $table->dateTime('tgKetThuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tailieu');
    }
};
