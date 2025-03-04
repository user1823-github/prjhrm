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
        Schema::create('ngayle', function (Blueprint $table) {
            $table->integer('maNL')->autoIncrement();
            $table->string('tieuDe'); // Tiêu đề ngày lễ
            $table->dateTime('tgBatDau'); // Thời gian bắt đầu
            $table->dateTime('tgKetThuc'); // Thời gian kết thúc
            $table->string('mauSac')->default('#FF0000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngayle');
    }
};
