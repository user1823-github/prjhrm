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
        Schema::dropIfExists('taisan');
        Schema::create('taisan', function (Blueprint $table) {
            $table->integer('maTS')->autoIncrement();
            $table->string('tenTaiSan', 50);
            $table->string('loaiTaiSan', 50);
            $table->integer('soLuong')->default(1);
            $table->string('hinhAnh')->nullable();
            $table->string('viTri')->nullable();
            $table->string('ghiChu')->nullable();
            $table->boolean('trangThai')->default(1);
            $table->integer('maNV');

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
        Schema::dropIfExists('taisan');
    }
};
