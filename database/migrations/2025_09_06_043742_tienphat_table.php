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
        Schema::create('tienphat', function (Blueprint $table) {
            $table->integer('maTienPhat')->autoIncrement();
            $table->string('tenPhat');
            $table->string('loaiPhat');
            $table->float('soTien');
            $table->dateTime('ngayPhat');
            $table->string('ghiChu');
            $table->boolean('trangThai')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tienphat');
    }
};
