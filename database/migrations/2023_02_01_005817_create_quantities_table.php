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
        Schema::create('quantities', function (Blueprint $table) {
           $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('size_id')->unsigned();
            $table->bigInteger('color_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('size_id')->references('id')->on('sizes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('color_id')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            
        });

        $products = DB::table('products')->get();
        foreach ($products as $product) {
            $sizes = DB::table('product_sizes')->where('product_id', $product->id)->get();
            foreach ($sizes as $size) {
                $colors = DB::table('product_colors')->where('product_id', $product->id)->get();
                foreach ($colors as $color) {
                    DB::table('quantities')
                    ->insert([
                        [
                            'product_id' => $product->id,
                            'size_id' => $size->size_id,
                            'color_id' => $color->color_id,
                            'quantity' => random_int(10,25),
                        ],
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantities');
    }
};
