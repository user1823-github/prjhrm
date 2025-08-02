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
        Schema::create('vantaychallenge', function (Blueprint $table) {
            $table->integer('maVTC')->autoIncrement();
            $table->string('challenge', 255);
            $table->timestamps();

            $table->integer('maNV')->index();
            $table
                ->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vantaychallenge', function (Blueprint $table) {
            $table->dropForeign(['maNV']);
        });
        Schema::dropIfExists('vantaychallenge');
    }
};
