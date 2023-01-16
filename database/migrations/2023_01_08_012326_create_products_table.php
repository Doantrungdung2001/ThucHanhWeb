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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brandId')->unsigned();
            $table->bigInteger('categoryId')->unsigned();
            $table->string('name', 30);
            $table->string('image_path')->nullable();
            $table->text('content');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brandId')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('categoryId')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
