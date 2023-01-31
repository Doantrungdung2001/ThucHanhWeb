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
                    'image_path' => 'https://lh3.googleusercontent.com/toq6yzcD8xzeVtQB_OFA4xhGKFGHK7TObiefaXaeOflbjG89bFF5yp_HXpJS3cuIOaGbhau2gY2uM-ZkVB0zhyedJs4NlNWq3vbF9MgqQJefbtrVfmM7aLDYongO3JTzbw7uJZeEvw=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '160000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi cộc tay ODIN CLUB Embroider',
                    'slug' => 'Áo-sơmi-cộc-tay-ODIN-CLUB-Embroider',
                    'image_path' => 'https://lh3.googleusercontent.com/DIA6u2VOJvpVUXf2c5JBCKovOc2z3aWPI_Ox2gjcLs8uT7JQraOpj6Eroxa0jlHfZsMfdnTRYKY3yCyqVLmuDEcGlgwp7HfugwAnvpesLSbfaT5XqU0FeBkmi3lsC9VIAcbiot9arA=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '285000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi Odin Club Light',
                    'slug' => 'Áo-sơmi-Odin-Club-Light',
                    'image_path' => 'https://lh3.googleusercontent.com/E2RVY5vN47mN3_NafEiGTjwOLnrqJZTMBt1TJW4cTTzv6dbWps_WrCyr-zELRpmAnU82iSaW8hvqpGNlsstJayF2FadnSnW7zaeC4NhbOQzXY2M1lDFjiTleS2zNLcP9auVVz7NwvQ=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '180000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo sơmi ODIN CLUB Sake',
                    'slug' => 'Áo-sơmi-ODIN-CLUB-Sake',
                    'image_path' => 'https://lh3.googleusercontent.com/d0bYpGCVsOOL4VSdMTudE7jcnbfCHyOminyt1zvtb51gNg_dewcl_Q16Kzw_TghhxYliyGkut2UNM0_xDW0gF0ygx7x037vxLPszCHDAkgMLkyz2w969u0jq17Lk9uI0qDMMJv78fA=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '295000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun AS RIGHT AS RAIN',
                    'slug' => 'Áo-thun-AS-RIGHT-AS-RAIN',
                    'image_path' => 'https://lh3.googleusercontent.com/P1RMwXszATrgirAHDg91QqKxGDjVJuuQoljqG0y3Qcdi3a3h7meb5fVc4g4DbRXdGf2Kr5EKyegR32GPY-o0za2ZDz49EUKIc3iQwKU3ROHd5-lswP1MaZ88DmTUP2Ql6UbOojzvYg=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '185000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun CARD GAME',
                    'slug' => 'Áo-thun-CARD-GAME',
                    'image_path' => 'https://lh3.googleusercontent.com/MeUz0nBvIptGsGoflARAMEV-0xJ4TCF9oXZog1oG4PHL9GpZAnNkp3ZrmLbVHZEkJ2MtCtX8ma6hhYtbV3Dld4TvUMmkDrR8wPgK8IeKQopkbB-6cOsKwuG44QcW7q8EKW_Av5QvBg=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun EASY DOES IT',
                    'slug' => 'Áo-thun-EASY-DOES-IT',
                    'image_path' => 'https://lh3.googleusercontent.com/PscTev8OSJ-FFA4vyNnBfl5RltCgzgT9qljSz2NjfkVq96F0LPFG1ypbyy5OysECkdcVORNu3u-_Nz5rkHF3-YfxFm6pkO9OQw2i9jVy6MPmn7ogM__FCx53JdLRunRLUyOboeywPA=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '185000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun ETERNITY ITA',
                    'slug' => 'Áo-thun-ETERNITY-ITA',
                    'image_path' => 'https://lh3.googleusercontent.com/fKmsoj1vjEGygMCjm4UMm54ueFE5eGFspx03rocvwclm6QaYTvUDKrMUlpxjgDHS6IDiyk8mHF83WRzpZUI7ReSRtM3W8faQ-t2QW9pFI6I5QHuz58coywISSyoEPgNNIYTSX3FRYA=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '245000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun OD DARK SHADOW',
                    'slug' => 'Áo-thun-OD-DARK-SHADOW',
                    'image_path' => 'https://lh3.googleusercontent.com/vWfUsac-BHDXtWwaoIKiark5Yc5SFQCgx6ERwgPhuuujhiw5XjWn2kP1kFqDzhrJYCYmSqjfOIHGoXcqD2Dnv9YmmNgklFxPT2on-8TPXWWtVRBmTiijESQLy3RRogk1_m263sPQNw=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun ODIN CLUB IGNITER',
                    'slug' => 'Áo-thun-ODIN-CLUB-IGNITER',
                    'image_path' => 'https://lh3.googleusercontent.com/oUH1cOzfR39KsWAAPsnGoPVPXl7cR98aeXFvD-3veuMNcz7kAS7pcsJWBOjisQ0oe_gVQd4gCJpGeaU8gfDvCQfFY1BhmWK8xVpo22H8RoW8uFhmSY-6-E12Q_LjuZBSjjYKIamdRQ=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun ODIN LET\'S ROCK',
                    'slug' => 'Áo-thun-ODIN-LET\'S-ROCK',
                    'image_path' => 'https://lh3.googleusercontent.com/kNSSA-3WvQu9A59z8S28x11bGBHxOv9bgd-DGA4H1F2_D983gkUOYBQEVJalWGZOpo7Thr6ybSAFrdLMSlPaboBo1pYNcqIde3TU-zgXQm_dMkkf6F-IBiBlc9TfKm9j8vlwcMKQ2Q=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun YES EYE SEE',
                    'slug' => 'Áo-thun-YES-EYE-SEE',
                    'image_path' => 'https://lh3.googleusercontent.com/knUXMIY75Sq1FiyOIVQQL3e0wNCWPip1IT9rkN_O76uszLWGWYfEvNeEtuY21k51tsB5W_tpSJ0N5buHJDwiITNLRb4ycMSsDmdR92EWzAxx2pprvAaVIh5GuaAYX1vGZ9WAc2IuuQ=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '195000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Quần short Corduroy Buttons ODIN CLUB',
                    'slug' => 'Quần-short-Corduroy-Buttons-ODIN-CLUB',
                    'image_path' => 'https://lh3.googleusercontent.com/BD1m_nNlNgUOYn4bmXjqKtKV9lUsJK5zOTc3Ndl_kfrGUy1Wd_lQUDW_NJ3E2yntyaXng1Pn9eQy6umwqzQ2AsDIZ-LWOGM0U0ONQ8H3C-Hrm8BtsDSwVBBQqnrSWwOu4cRnMq-Frg=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '170000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '2',
                    'name' => 'Quần Short Odin Club Windy',
                    'slug' => 'Quần-Short-Odin-Club-Windy',
                    'image_path' => 'https://lh3.googleusercontent.com/BEn8kMIvxpAQElkt3DbRTevR2zcj0jfP6gTrOm4Nb4pC1-v_N5CvWufHVHYiv1frogmG_5FoWUSDHREta4-PmqZVx22LIs6aMbYzQbwHMDH3_KO-8qAIDbJQDmSuZeNn1KHTPNczHg=w2400',
                    'content' => '',
                    'quantity' => 10,
                    'price' => '170000',
                ],
                [
                    'brand_id' => '1',
                    'category_id' => '1',
                    'name' => 'Áo thun oversize ODIN CLUB Waffle Atelier',
                    'slug' => 'Áo-thun-oversize-ODIN-CLUB-Waffle-Atelier',
                    'image_path' => 'https://lh3.googleusercontent.com/TtgzPqnhCh6iE356kWKRAc1GeBUjQH--le7uBTvo9qFJKrozMtCDCOl9kQRShkq6viIiWZPTuRZz5uoq4FauXALe3xlR1zeEnB5pR34bMB0gsdnzF2J4U-XSI1E0NyBWHJsJ24pAJg=w2400',
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
