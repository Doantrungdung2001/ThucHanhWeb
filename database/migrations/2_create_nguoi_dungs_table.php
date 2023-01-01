<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_phan_quyen')->unsigned();
            $table->string('ten_dang_nhap', 30);
            $table->string('mat_khau', 30);
            $table->string('ho_va_ten', 30);
            $table->string('sdt', 11);
            $table->string('email', 30);
            $table->date('ngay_sinh');
            $table->string('dia_chi', 50);
            $table->enum('trang_thai', ['hoat_dong','khoa']);
            $table->timestamps();
            
            $table->foreign('id_phan_quyen')->references('id')->on('phan_quyen')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_dung');
    }
};
