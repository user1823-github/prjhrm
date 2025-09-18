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
        Schema::create('tienphat_nhanvien', function (Blueprint $table) {
            $table->integer('maTienPhat');
            $table->integer('maNV');
            $table->timestamps();

            // Foreign key với cascade
            $table->foreign('maTienPhat')
                ->references('maTienPhat')
                ->on('tienphat')
                // ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                // ->onDelete('cascade')
                ->onUpdate('cascade');

            // Tránh trùng quan hệ (mỗi IP chỉ gắn 1 lần với 1 LLV)
            $table->primary(['maTienPhat', 'maNV']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tienphat_nhanvien');
    }
};
