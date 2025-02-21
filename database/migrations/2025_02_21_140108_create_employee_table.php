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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id('maNhanVien')->autoIncrement();
            $table->string('hoTen')->nullable();
            $table->string('chucDanh')->nullable();
            $table->string('soDienThoai')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('gioiTinh', ['Nam', 'Nữ', 'Khác']);
            $table->date('ngayVaoLam');
            $table->date('ngaySinh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
    }
};
