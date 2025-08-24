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
        Schema::create('baohiemxh', function (Blueprint $table) {
            $table->integer('maBHXH')->autoIncrement();
            $table->string('maSoBHXH')->nullable();
            $table->enum('vung', [
                'Vùng 1 (4,960,000 VND/tháng)',
                'Vùng 2 (4,410,000 VND/tháng)',
                'Vùng 3 (3,860,000 VND/tháng)',
                'Vùng 4 (3,450,000 VND/tháng)',
            ]);
            // $table->float('bhxh_NLD')->default(0);
            // $table->float('bhyt_NLD')->default(0);
            // $table->float('bhtn_NLD')->default(0);
            // $table->float('bhxh_DN')->default(0);
            // $table->float('bhyt_DN')->default(0);
            // $table->float('bhtn_DN')->default(0);
            // $table->float('dpcd_NLD')->default(0); 
            // $table->float('kpcd_DN')->default(0);
            $table->string('ghiChu')->nullable();
            $table->string('dinhKem')->nullable();
            $table->dateTime('ngayDangKy')->nullable();

            
            $table->integer('maNV');

            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
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
        Schema::dropIfExists('baohiemxh');
    }
};
