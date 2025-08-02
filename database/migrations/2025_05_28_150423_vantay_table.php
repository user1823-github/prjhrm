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
        Schema::create('vantay', function (Blueprint $table) {
            $table->integer('maVT')->autoIncrement();
            $table->text('credentialID')->nullable();
            $table->text('authenticatorAttachment')->nullable();
            $table->integer('maNV')->unique();
            $table
                ->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('vantay', function (Blueprint $table) {
            $table->dropForeign(['maNV']);
        });
        Schema::dropIfExists('vantay');
    }
};
