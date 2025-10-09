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
        Schema::create('lichsuchamcong', function (Blueprint $table) {
            // Chấm đầu ca
            $table->integer('maLSChamCong')->autoIncrement();
            $table->string('viDoCheckIn')->nullable();
            $table->string('kinhDoCheckIn')->nullable();
            $table->ipAddress('diaChiIPCheckIn')->nullable();
            $table->string('hinhAnhCheckIn')->nullable();
            // Chấm ra giữa ca
            $table->string('viDoCheckMidOut')->nullable();
            $table->string('kinhDoCheckMidOut')->nullable();
            $table->ipAddress('diaChiIPCheckMidOut')->nullable();
            $table->string('hinhAnhCheckMidOut')->nullable();
            // Chấm vào giữa ca
            $table->string('viDoCheckMidIn')->nullable();
            $table->string('kinhDoCheckMidIn')->nullable();
            $table->ipAddress('diaChiIPCheckMidIn')->nullable();
            $table->string('hinhAnhCheckMidIn')->nullable();
            // Chấm cuối ca
            $table->string('viDoCheckOut')->nullable();
            $table->string('kinhDoCheckOut')->nullable();
            $table->ipAddress('diaChiIPCheckOut')->nullable();
            $table->string('hinhAnhCheckOut')->nullable();
            $table->integer('maBC'); // khóa ngoại 1-1

            $table->foreign('maBC')->references('maBC')->on('bangcong')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lichsuchamcong');
    }
};
