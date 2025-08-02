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
        Schema::dropIfExists('thuchi');
        Schema::create('thuchi', function (Blueprint $table) {
            $table->integer('maGD')->autoIncrement();
            $table->dateTime('ngayTao');
            $table->string('tenGiaoDich');
            $table->string('loaiGiaoDich');
            $table->string('nguoiThuHoacChi')->nullable();
            $table->decimal('soTien', 15, 2);
            $table->string('nguoiNophoacNhan')->nullable();
            $table->string('dinhKem')->nullable();
            $table->text('ghiChu')->nullable();
            $table->integer('maLGD'); // Mã loại giao dịch
            $table->integer('maNT');

            $table->foreign('maLGD')
                ->references('maLGD')
                ->on('loaigiaodich')
                ->onUpdate('cascade');

            $table->foreign('maNT')
                ->references('maNT')
                ->on('nguontien')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thuchi', function (Blueprint $table) {
            $table->dropForeign(['maLGD']);
            $table->dropForeign(['maNT']);
        });
        Schema::dropIfExists('thuchi');
    }
};
