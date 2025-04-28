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
        Schema::create('nhanvien_calam', function (Blueprint $table) {
            $table->integer('maNV');
            $table->integer('maCL');
            $table->timestamps();

            // Foreign key với cascade
            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('maCL')
                ->references('maCL')
                ->on('calam')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Tránh trùng quan hệ (mỗi IP chỉ gắn 1 lần với 1 LLV)
            $table->primary(['maNV', 'maCL']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien_calam');
    }
};
