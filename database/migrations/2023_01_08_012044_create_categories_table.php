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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('categories')
            ->insert([
                [
                    'name' => 'Áo',
                    'slug' => 'Ao'
                ],
                [
                    'name' => 'Quần',
                    'slug' => 'Quan'
                ],
                [
                    'name' => 'Giầy dép',
                    'slug' => 'Giay-dep'
                ],
                [
                    'name' => 'Phụ kiện',
                    'slug' => 'Phu-kien'
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
        Schema::dropIfExists('categories');
    }
};
