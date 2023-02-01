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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('id_invoice');
            $table->integer('id_user');
            $table->integer('id_product');
            $table->string('name');
            $table->integer('id_category')->nullable();
            $table->integer('quanty');
            $table->string('size');
            $table->string('color');
            $table->integer('price');
            $table->integer('total_price');
            $table->string('image_url');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
