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
        Schema::create('diachiip_lichlamviec', function (Blueprint $table) {
            $table->integer('maDCIPLLV')->autoIncrement(); // Tạo id riêng cho bảng nếu cần truy xuất hoặc log
            $table->boolean('trangThai')->default(true);
            $table->integer('maDCIP');
            $table->integer('maLLV');

            
            // Foreign key với cascade
            $table->foreign('maDCIP')
            ->references('maDCIP')
            ->on('diachiip')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('maLLV')
            ->references('maLLV')
            ->on('lichlamviec')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            // Tránh trùng quan hệ (mỗi IP chỉ gắn 1 lần với 1 LLV)
            $table->unique(['maDCIP', 'maLLV']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diachiip_lichlamviec');
    }
};
