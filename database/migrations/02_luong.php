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
        Schema::dropIfExists('luong');
        Schema::create('luong', function (Blueprint $table) {
            $table->integer('maLuong')->autoIncrement(); // Mã lương (ID)
            $table->enum('kieuLuong', [
                'Lương giờ có trừ trễ',
                'Lương giờ không trừ trễ',
                'Lương giờ làm bao nhiêu tính bấy nhiêu',
                'Lương tháng có trừ trễ',
                'Lương tháng không trừ trễ',
                'Lương tháng làm bao nhiêu tính bấy nhiêu',
            ]); // Kiểu lương cố định
            $table->decimal('soTien', 15, 2); // Số tiền
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luong');
    }
};
