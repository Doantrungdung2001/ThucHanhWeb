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
                    'name' => 'Áo Polo',
                    'slug' => 'Áo-polo'
                ],
                [
                    'name' => 'Áo sơ mi cộc tay',
                    'slug' => 'Áo-sơ-mi-cộc-tay'
                ],
                [
                    'name' => 'Áo sơ mi dài tay',
                    'slug' => 'Áo-sơ-mi-dài-tay'
                ],
                [
                    'name' => 'Áo sơ mi',
                    'slug' => 'Áo-sơ-mi'
                ],
                [
                    'name' => 'Áo thun',
                    'slug' => 'Áo-thun'
                ],
                [
                    'name' => 'Quần dài',
                    'slug' => 'Quần-dài'
                ],
                [
                    'name' => 'Quần short',
                    'slug' => 'Quần-short'
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
