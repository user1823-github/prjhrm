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
        Schema::create('phieuluong', function (Blueprint $table) {
            $table->integer('maPL')->autoIncrement();
            $table->enum('kieuLuong', [
                'Lương giờ có trừ trễ',
                'Lương giờ không trừ trễ',
                'Lương giờ làm bao nhiêu tính bấy nhiêu',
                'Lương tháng có trừ trễ',
                'Lương tháng không trừ trễ',
                'Lương tháng làm bao nhiêu tính bấy nhiêu'
            ]);
            $table->boolean('trangThaiTT')->default(0); // 0: Chưa thanh toán, 1: Đã thanh toán
            $table->decimal('luongCoBan', 15, 2)->default(0);
            $table->decimal('luongGio', 15, 2)->default(0);
            $table->integer('gioLam')->default(0);
            $table->integer('caLam')->default(0);
            $table->integer('gioOT')->default(0);
            $table->integer('caOT')->default(0);
            $table->decimal('luongOT', 15, 2)->default(0);
            $table->decimal('luongHeSo', 15, 2)->default(1);
            $table->decimal('luongThuong', 15, 2)->nullable()->default(0);
            $table->decimal('tongCong', 15, 2)->default(0);
            $table->integer('maNV');

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phieuluong');
    }
};
