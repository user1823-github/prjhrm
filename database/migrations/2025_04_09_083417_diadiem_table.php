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
        Schema::create('diadiem', function (Blueprint $table) {
            $table->integer('maDD')->autoIncrement(); // Primary key
            $table->string('tenDiaDiem');
            $table->decimal('viDo', 10, 7);
            $table->decimal('kinhDo', 10, 7);
            $table->integer('banKinh'); // Bán kính (tùy đơn vị bạn chọn)
            $table->boolean('trangThai')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diadiem');
    }
};
