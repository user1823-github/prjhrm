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
        Schema::create('chitietcalam', function (Blueprint $table) {
            $table->integer('maCTCL')->autoIncrement(); // Khóa chính tự động tăng
            $table->integer('thuTrongTuan'); // Thứ trong tuần (1 = Thứ 2, 7 = Chủ nhật)
            $table->time('tgBatDau'); // Giờ bắt đầu ca làm
            $table->time('tgKetThuc'); // Giờ kết thúc ca làm
            $table->time('tgBatDauNghi')->nullable(); // Giờ bắt đầu nghỉ
            $table->time('tgKetThucNghi')->nullable(); // Giờ kết thúc nghỉ
            $table->decimal('heSoLuong', 5, 2)->default(1.0); // Hệ số lương (VD: 1.5, 2.0)
            $table->decimal('phuCap', 10, 2)->default(0.0); // Phụ cấp (VD: 500000)

            $table->integer('maCL');
            
            $table->foreign('maCL')->references('maCL')->on('calam')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chitietcalam', function (Blueprint $table) {
            $table->dropForeign(['maCL']);
        });

        Schema::dropIfExists('chitietcalam');
    }
};
