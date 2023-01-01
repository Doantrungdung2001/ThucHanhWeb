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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_hang')->unsigned();
            $table->bigInteger('id_danh_muc')->unsigned();
            $table->string('ten_san_pham', 30);
            $table->enum('mau_sac', ['red', 'green', 'blue', 'yellow']);
            $table->enum('kich_co', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->integer('so_luong');
            $table->float('gia_nhap');
            $table->timestamps();

            $table->foreign('id_hang')->references('id')->on('hang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_danh_muc')->references('id')->on('danh_muc_san_pham')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
};
