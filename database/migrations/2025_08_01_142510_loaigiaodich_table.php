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
        Schema::dropIfExists('loaigiaodich');
        Schema::create('loaigiaodich', function (Blueprint $table) {
            $table->integer('maLGD')->autoIncrement();
            $table->string('tenLoaiGiaoDich');
            $table->string('hinhAnhHienThi')->nullable();
            $table->text('ghiChu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaigiaodich');
    }
};
