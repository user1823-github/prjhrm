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
        Schema::create('diadiem_lichlamviec', function (Blueprint $table) {
            $table->integer('maDD');
            $table->integer('maLLV');
            $table->boolean('trangThai')->default(true);
            $table->timestamps();

            // Foreign key với cascade
            $table->foreign('maDD')
                ->references('maDD')
                ->on('diadiem')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('maLLV')
                ->references('maLLV')
                ->on('lichlamviec')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Tránh trùng quan hệ (mỗi IP chỉ gắn 1 lần với 1 LLV)
            $table->primary(['maDD', 'maLLV']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diadiem_lichlamviec');
    }
};
