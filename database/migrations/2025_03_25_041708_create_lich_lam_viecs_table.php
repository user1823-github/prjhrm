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
        Schema::create('lichlamviec', function (Blueprint $table) {
            $table->integer('maLLV')->autoIncrement();
            $table->string('tenCa', 50); // Tên ca làm
            $table->date('ngayLamViec'); // Ngày làm việc
            $table->time('tgBatDau'); // Giờ bắt đầu làm việc
            $table->time('tgKetThuc'); // Giờ kết thúc làm việc
            $table->time('tgBatDauNghi')->nullable(); // Giờ bắt đầu nghỉ
            $table->time('tgKetThucNghi')->nullable(); // Giờ kết thúc nghỉ
            $table->time('tgCheckInSom')->nullable(); // Số phút check-in sớm tối đa
            $table->time('tgCheckOutMuon')->nullable(); // Số phút check-out muộn tối đa
            $table->decimal('heSoLuong', 5, 2)->default(1.0); // Hệ số lương
            $table->decimal('phuCap', 10, 2)->default(0.00); // Phụ cấp
            $table->decimal('tienThuong', 10, 2)->default(0.00); // Tiền thưởng
            $table->decimal('tienPhat', 10, 2)->default(0.00); // Tiền thưởng

            // $table->integer('maTK')->unique();  // Thêm cột khóa ngoại
            $table->integer('maNV');
            // $table->integer('maNL');
            // $table->integer('maCTCL');

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // $table->foreign('maNL')->references('maNL')->on('ngayle')->onDelete('cascade');
            // $table->foreign('maCTCL')->references('maCTCL')->on('chitietcalam')->onDelete('cascade');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lichlamviec', function (Blueprint $table) {
            $table->dropForeign(['maNV']);
            // $table->dropForeign(['maNL']);
            // $table->dropForeign(['maCTCL']);
        });
        Schema::dropIfExists('lichlamviec');
    }
};
