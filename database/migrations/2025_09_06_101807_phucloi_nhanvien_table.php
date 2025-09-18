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
        Schema::create('phucloi_nhanvien', function (Blueprint $table) {
            $table->integer('maPhucLoi');
            $table->integer('maNV');
            $table->timestamps();

            // Foreign key với cascade
            $table->foreign('maPhucLoi')
                ->references('maPhucLoi')
                ->on('phucloi')
                // ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                // ->onDelete('cascade')
                ->onUpdate('cascade');

            // Tránh trùng quan hệ (mỗi IP chỉ gắn 1 lần với 1 LLV)
            $table->primary(['maPhucLoi', 'maNV']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phucloi_nhanvien');
    }
};
