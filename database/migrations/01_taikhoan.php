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
        // Schema::dropIfExists('taikhoan');
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->integer('maTaiKhoan')->autoIncrement();
            $table->string('tenTaiKhoan', 100)->unique();
            $table->string('matKhau');
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
