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
        Schema::dropIfExists('nhanvien');
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->integer('maNhanVien')->autoIncrement();
            $table->string('hoTen', 50)->nullable();
            $table->string('chucDanh')->nullable();
            $table->string('soDienThoai', 20)->unique()->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->enum('gioiTinh', ['Nam', 'Nữ', 'Khác']);
            $table->date('ngayVaoLam');
            $table->date('ngaySinh')->nullable();
            
            $table->integer('maTaiKhoan');  // Thêm cột khóa ngoại

            $table->foreign('maTaiKhoan')->references('maTaiKhoan')->on('taikhoan')->onDelete('cascade');
            
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nhanvien', function (Blueprint $table) {
            $table->dropForeign(['maTaiKhoan']);
        });
        Schema::dropIfExists('nhanvien');
    }
};
