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
        Schema::dropIfExists('nguontien');
        Schema::create('nguontien', function (Blueprint $table) {
            $table->integer('maNT')->autoIncrement();
            $table->string('tenNguonTien', 50);
            $table->string('loaiNguonTien', 50)->nullable();
            $table->integer('soTien')->nullable();
            $table->boolean('trangThai')->default(1);
            $table->string('ghiChu')->nullable();
            $table->integer('maNV'); // Mã nhân viên quản lý tài khoản này,

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nguontien', function (Blueprint $table) {
            $table->dropForeign(['maNV']);
        });
        Schema::dropIfExists('nguontien');
    }
};
