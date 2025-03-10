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
        Schema::dropIfExists('taikhoan');
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->integer('maTK')->autoIncrement();
            $table->string('tenTaiKhoan', 50)->unique();
            $table->string('matKhau', 100);
            $table->enum('quyenHan', ['admin', 'user'])->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taikhoan');
    }
};
