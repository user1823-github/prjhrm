<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('calam', function (Blueprint $table) {
            $table->integer('maCL')->autoIncrement(); // maCL (Mã ca làm - tự động tăng)
            $table->string('tenCa');
            $table->integer('gioCheckInSom');
            $table->integer('gioCheckOutMuon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calam');
    }
};
