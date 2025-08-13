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
            $table->integer('maVTC');
            // $table->integer('maNV')->unique();
            $table->integer('maNV');

            $table
                ->foreign('maVTC')
                ->references('maVTC')
                ->on('vantaychallenge')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
            $table->dropForeign(['maVTC']);
            $table->dropForeign(['maNV']);
        });
        Schema::dropIfExists('vantay');
    }
};
