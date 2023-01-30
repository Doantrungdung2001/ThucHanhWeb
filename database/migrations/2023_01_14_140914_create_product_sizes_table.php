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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();;
            $table->bigInteger('size_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('size_id')->references('id')->on('sizes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });

         DB::table('product_sizes')
            ->insert([
                [
                    'product_id' => 1,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 1,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 1,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 2,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 2,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 2,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 3,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 3,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 3,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 4,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 4,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 4,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 5,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 5,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 5,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 6,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 6,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 6,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 7,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 7,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 7,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 8,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 8,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 8,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 9,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 9,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 9,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 10,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 10,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 10,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 11,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 11,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 11,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 12,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 12,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 12,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 13,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 13,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 13,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 14,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 14,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 14,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 15,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 15,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 15,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 16,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 16,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 16,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 17,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 17,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 17,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 18,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 18,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 18,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 19,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 19,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 19,
                    'size_id' => 5,
                ],
                [
                    'product_id' => 20,
                    'size_id' => 3,
                ],
                [
                    'product_id' => 20,
                    'size_id' => 4,
                ],
                [
                    'product_id' => 20,
                    'size_id' => 5,
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
        Schema::dropIfExists('product_size');
    }
};
