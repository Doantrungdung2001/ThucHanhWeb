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
        Schema::create('chi_tiet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_hoa_don_nhap')->unsigned();
            $table->bigInteger('id_san_pham')->unsigned();
            $table->integer('so_luong');

            $table->foreign('id_hoa_don_nhap')->references('id')->on('hoa_don_nhap')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_san_pham')->references('id')->on('san_pham')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet');
    }
};