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
            $table->integer('maNV')->autoIncrement();
            $table->string('hoTen', 50)->nullable();
            $table->string('chucDanh')->nullable();
            $table->string('soDienThoai', 20)->unique()->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->enum('gioiTinh', ['Nam', 'Nữ', 'Khác'])->nullable();
            $table->date('ngayVaoLam')->nullable();
            $table->date('ngaySinh')->nullable();
            $table->boolean('trangThai');

            $table->integer('maTK')->unique();  // Thêm cột khóa ngoại
            $table->integer('maCL')->nullable();  // Thêm cột khóa ngoại

            $table->foreign('maTK')
                ->references('maTK')
                ->on('taikhoan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('maCL')
                ->references('maCL')
                ->on('calam')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nhanvien', function (Blueprint $table) {
            $table->dropForeign(['maTK']);
            $table->dropForeign(['maCL']);
        });
        Schema::dropIfExists('nhanvien');
    }
};
