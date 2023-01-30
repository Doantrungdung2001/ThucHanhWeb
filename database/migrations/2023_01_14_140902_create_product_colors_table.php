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
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();;
            $table->bigInteger('color_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('color_id')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });

         DB::table('product_colors')
            ->insert([
                [
                    'product_id' => 1,
                    'color_id' => 1,
                ],
                [
                    'product_id' => 2,
                    'color_id' => 1,
                ],
                [
                    'product_id' => 3,
                    'color_id' => 1,
                ],
                [
                    'product_id' => 4,
                    'color_id' => 1,
                ],
                [
                    'product_id' => 5,
                    'color_id' => 1,
                ],
                [
                    'product_id' => 6,
                    'color_id' => 1,
                ],
                [
                    'product_id' => 1,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 2,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 7,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 8,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 9,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 10,
                    'color_id' => 2,
                ],
                 [
                    'product_id' => 11,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 12,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 13,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 14,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 15,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 16,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 17,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 5,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 18,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 19,
                    'color_id' => 2,
                ],
                [
                    'product_id' => 8,
                    'color_id' => 3,
                ],
                [
                    'product_id' => 4,
                    'color_id' => 4,
                ],
                [
                    'product_id' => 8,
                    'color_id' => 4,
                ],
                [
                    'product_id' => 5,
                    'color_id' => 4,
                ],
                [
                    'product_id' => 18,
                    'color_id' => 4,
                ],
                [
                    'product_id' => 20,
                    'color_id' => 5,
                ],
                [
                    'product_id' => 2,
                    'color_id' => 6,
                ],
                [
                    'product_id' => 3,
                    'color_id' => 6,
                ],
                [
                    'product_id' => 7,
                    'color_id' => 6,
                ],
                [
                    'product_id' => 9,
                    'color_id' => 7,
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_colors');
    }
};
