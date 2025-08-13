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
        Schema::create('donphep', function (Blueprint $table) {
            $table->integer('maDP')->autoIncrement();
            $table->dateTime('ngayTao');
            $table->enum('loaiNghiPhep', [
                'Nghỉ phép năm',
                'Nghỉ không lương',
                'Nghỉ có lương',
                'Nghỉ đột xuất',
                'Nghỉ phép ốm',
                'Nghỉ thai sản',
            ]);
            $table->string('lyDo');
            $table->date('ngayNghi');
            $table->time('batDauNghi');
            $table->time('ketThucNghi');
            $table->string('hinhAnh')->nullable();
            $table->enum('trangThai', [
                'Chờ duyệt',
                'Đã duyệt',
                'Từ chối',
            ])->default('Chờ duyệt');
            $table->string('nhanXet')->nullable();
            $table->float('truPhep')->nullable();

            $table->integer('maLLV');
            $table->integer('maNV');

            $table->foreign('maLLV')
                ->references('maLLV')
                ->on('lichlamviec')
                ->onUpdate('cascade');


            $table->foreign('maNV')
                ->references('maNV')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donphep');
    }
};
