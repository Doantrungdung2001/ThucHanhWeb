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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_hang');
            $table->bigInteger('id_danh_muc');
            $table->string('ten_san_pham', 30);
            $table->enum('mau_sac', ['red', 'green', 'blue', 'yellow']);
            $table->enum('kich_co', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->integer('so_luong');
            $table->float('gia_nhap');
            $table->timestamps();

            $table->foreign('id_hang')->references('id')->on('hangs')->onDelete('cascade');
            $table->foreign('id_phan_quyenid_danh_muc')->references('id')->on('danh_mucs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_phams');
    }
};
