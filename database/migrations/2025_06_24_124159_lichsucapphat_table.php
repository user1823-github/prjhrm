<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('lichsucapphat');
        Schema::create('lichsucapphat', function (Blueprint $table) {
            $table->integer('maLSCP')->autoIncrement();
            $table->dateTime('ngayTao');
            $table->integer('soLuongCapPhat');
            $table->string('nguoiSuDung');
            $table->dateTime('ngayNhan')->nullable();
            $table->integer('soLuongThuHoi')->default(0);
            $table->string('nguoiThuHoi');
            $table->dateTime('ngayThuHoi')->nullable();
            $table->string('nguoiBanGiao');
            $table->string('hinhAnh')->nullable();
            $table->string('ghiChu')->nullable();

            $table->integer('maTS')->nullable();

            $table->foreign('maTS')
                ->references('maTS')
                ->on('taisan')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lichsucapphat');
    }
};
