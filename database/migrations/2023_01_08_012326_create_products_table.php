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
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->string("slug")->unique();
            $table->string('image_path')->nullable();
            $table->text('content')->nullable();
            $table->integer('quantity')->default('10');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });

        DB::table('products')
            ->insert([
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo Polo Oversize Jack Lane Badge',
                    'slug' => 'Áo-Polo-Oversize-Jack-Lane-Badge',
                    'image_path' => 'https://lh3.googleusercontent.com/MEGNODHMPItHfJM_RkGhlSloAUlu4Za1T4J09ZSp4pAkBPxVHgRq0huPAouaUukq9obhF2mxvnEyFOE46fPXIA7KpCFAP6KV--JAtgowUsbOs2tzX1EdJOJGcrHCMYBl26uSYRPdYg=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '210000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo Polo Oversize ODIN CLUB Fear No More',
                    'slug' => 'Áo-Polo-Oversize-ODIN-CLUB-Fear-No-More',
                    'image_path' => 'https://lh3.googleusercontent.com/125FykgbuFYhzEjZx3kEAacJiqCTlzE8mDZGniWcg0ffxD_zp4gP4-PZdoYrXZHeqYCQEPxZ3oGGDqsDDCIgQ9sDuvjNE5wSlN9xKv46F2Fv9M7pigvaD4n8iA77xvPvu_C_4fSvZQ=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '240000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo Polo Oversize ODIN CLUB Striped',
                    'slug' => 'Áo-Polo-Oversize-ODIN-CLUB-Striped',
                    'image_path' => 'https://lh3.googleusercontent.com/HcbGJfZrDkmhqe5o-8otOhYc3mNIv23sEqeAnThV_G2JdGgvkQw1zYCm-yN0ri-fIJe7sIz7dqLdPDIeoFfjhmW9ChLjAb93EXFS4yeSQTdtfLreOu9r4JXApzSAyHgGgyPF2G1AAg=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '240000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi dài tay Flannel ODIN',
                    'slug' => 'Áo-sơmi-dài-tay-Flannel-ODIN',
                    'image_path' => 'https://lh3.googleusercontent.com/UDILqzFvdwae-ISKZ85Rb_LTYljxUfLyoUUc5F1NSjr-Qgz06Ho-_Fui1brkGNJ92UZMtdV7rsxwNAX4VJxFZniIKkMc7YrUj3X39rU4DxA5GRvPpN5k5h6wCBm-SbcsQgzMuAwqDQ=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '299000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Quần dài Corduroy ODIN Pants',
                    'slug' => 'Quần-dài-Corduroy-ODIN-Pants',
                    'image_path' => 'https://lh3.googleusercontent.com/Ii1a9AnEwEP1W2X0jlEI57B3kPzjxVq35TZHLlsQ6ipDRnTI1kpMrpqzXB1sXIxjG1JSM84N85nUcoEGYlCy8HYp-4nVfiSB0u9nHp3-vjDVMh11TkJ6qUvr8AQvfmxZV8_qECzSEw=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '270000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Quần short nỉ Odin Essentials',
                    'slug' => 'Quần-short-nỉ-Odin-Essentials',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '160000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi cộc tay ODIN CLUB Embroider',
                    'slug' => 'Áo-sơmi-cộc-tay-ODIN-CLUB-Embroider',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '285000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi Odin Club Light',
                    'slug' => 'Áo-sơmi-Odin-Club-Light',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '180000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi ODIN CLUB Sake',
                    'slug' => 'Áo-sơmi-ODIN-CLUB-Sake',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '295000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun AS RIGHT AS RAIN',
                    'slug' => 'Áo-thun-AS-RIGHT-AS-RAIN',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '185000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun CARD GAME',
                    'slug' => 'Áo-thun-CARD-GAME',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun EASY DOES IT',
                    'slug' => 'Áo-thun-EASY-DOES-IT',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '185000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun ETERNITY ITA',
                    'slug' => 'Áo-thun-ETERNITY-ITA',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '245000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun OD DARK SHADOW',
                    'slug' => 'Áo-thun-OD-DARK-SHADOW',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun ODIN CLUB IGNITER',
                    'slug' => 'Áo-thun-ODIN-CLUB-IGNITER',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun ODIN LET\'S ROCK',
                    'slug' => 'Áo-thun-ODIN-LET\'S-ROCK',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun YES EYE SEE',
                    'slug' => 'Áo-thun-YES-EYE-SEE',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Quần short Corduroy Buttons ODIN CLUB',
                    'slug' => 'Quần-short-Corduroy-Buttons-ODIN-CLUB',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '170000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Quần Short Odin Club Windy',
                    'slug' => 'Quần-Short-Odin-Club-Windy',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '170000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Áo thun oversize ODIN CLUB Waffle Atelier',
                    'slug' => 'Áo-thun-oversize-ODIN-CLUB-Waffle-Atelier',
                    'image_path' => '',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '180000',
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
        Schema::dropIfExists('products');
    }
};
