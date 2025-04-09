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
        Schema::create('diachiip', function (Blueprint $table) {
            $table->integer('maDCIP')->autoIncrement(); // Primary key
            $table->string('tenThietBi');
            $table->ipAddress('diaChiIP'); // Kiểu IP
            $table->boolean('trangThai')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diachiip');
    }
};
