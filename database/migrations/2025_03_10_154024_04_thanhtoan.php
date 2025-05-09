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
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->integer('maTT')->autoIncrement(); // Mã thanh toán (ID)
            $table->string('tenDVhoacNH'); // Tên dịch vụ hoặc ngân hàng
            $table->string('soDThoacSTK'); // Số điện thoại hoặc số tài khoản
            $table->string('tenChuTaiKhoan'); // Tên chủ tài khoản
            $table->string('loaiTaiKhoan'); // Loại tài khoản (Ngân hàng, ví điện tử, ...)
            $table->string('hinhAnh')->nullable(); // Hình ảnh (đường dẫn)
            $table->integer('maNV');
            
            $table->foreign('maNV')->references('maNV')->on('nhanvien')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thanhtoan', function (Blueprint $table) {
            $table->dropForeign(['maNV']);
        });

        Schema::dropIfExists('thanhtoan');
    }
};
