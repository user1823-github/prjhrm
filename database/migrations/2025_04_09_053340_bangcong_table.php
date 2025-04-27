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
        Schema::create('bangcong', function (Blueprint $table) {
            $table->integer('maBC')->autoIncrement();
            $table->time('tgCheckIn')->nullable();
            $table->time('tgCheckOut')->nullable();
            $table->integer('maLLV')->unique(); // khóa ngoại 1-1

            $table->foreign('maLLV')->references('maLLV')->on('lichlamviec')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangcong');
    }
};
