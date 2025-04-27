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
        Schema::create('ngayphep', function (Blueprint $table) {
            $table->integer('maNP')->autoIncrement();
            $table->integer('namPhep');
            $table->integer('soNgay')->nullable();
            $table->integer('daNghi')->nullable();
            $table->integer('conLai')->nullable();
            $table->integer('maNV');

            // $table->unique(['maNV', 'namPhep']);

            $table->foreign('maNV')->references('maNV')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngayphep');
    }
};
