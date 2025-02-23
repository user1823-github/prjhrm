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
        Schema::create('hopthoai', function (Blueprint $table) {
            $table->id('maHT'); // Khóa chính tự động tăng
            $table->string('tieuDe'); // Tiêu đề hộp thoại
            $table->text('noiDung'); // Nội dung
            $table->string('url')->nullable(); // URL liên kết (nếu có)
            $table->integer('soLanHienThi')->default(0); // Số lần hiển thị
            $table->dateTime('tgBatDau')->nullable(); // Thời gian bắt đầu hiển thị
            $table->dateTime('tgKetThuc')->nullable(); // Thời gian kết thúc hiển thị
            $table->string('iconHienThi')->nullable(); // Ảnh icon của hộp thoại
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hopthoai');
    }
};


