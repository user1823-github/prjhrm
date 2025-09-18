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
        Schema::create('phucloi', function (Blueprint $table) {
            $table->integer('maPhucLoi')->autoIncrement();
            $table->string('tenPhucLoi');
            $table->string('loaiPhucLoi');
            $table->float('soTien');
            $table->dateTime('ngayKhenThuong');
            $table->string('hinhThuc');
            $table->string('ghiChu');
            $table->boolean('tinhThue')->default(false);
           $table->boolean('trangThai')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phucloi');
    }
};
