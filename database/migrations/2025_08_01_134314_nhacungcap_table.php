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
        Schema::dropIfExists('nhacungcap');
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->integer('maNCC')->autoIncrement();
            $table->string('tenNhaCungCap', 50);
            $table->string('diaChi', 255)->nullable();
            $table->string('soDienThoai', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('linkWebsite', 100)->nullable();
            $table->string('ghiChu', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhacungcap');
    }
};
