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
        Schema::create('thuetncn', function (Blueprint $table) {
            $table->integer('maTNCN')->autoIncrement();
            $table->string('maSoThue')->nullable();
            $table->integer('soNguoiPhuThuoc')->default(0);
            $table->float('soTienGiamTru')->default(0);

            $table->string('ghiChu')->nullable();
            $table->string('dinhKem')->nullable();
            $table->dateTime('ngayDangKy')->nullable();
            // $table->date('ngayBatDauGiamTru')->nullable();
            // $table->date('ngayKetThucGiamTru')->nullable();

            $table->integer('maNV');

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
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
        Schema::dropIfExists('thuetncn');
    }
};
