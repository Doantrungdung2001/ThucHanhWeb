<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default('USER');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->bigInteger('id_phan_quyen')->unsigned()->nullable();
            $table->string('sdt', 11)->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('dia_chi', 50)->nullable();
            $table->enum('trang_thai', ['hoat_dong','khoa'])->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')
            ->insert([
                [
                    'name'  => 'Nguyễn Trọng Tuệ',
                    'email' => 'diepanhng0711@gmail.com',
                    'role'  => 'ADMIN',
                    'password'  => Hash::make('admin4552'),
                    'sdt'   =>  '0946103302',
                    'dia_chi' => 'TDP Lâm Khang - TT Quất Lâm - Giao Thủy - Nam Định'
                ],
                [
                    'name'  => 'Nguyễn Việt Nam',
                    'email' => 'vietnammuonnam2308@gmail.com',
                    'role'  => 'USER',
                    'password'  => Hash::make('12345678'),
                    'sdt'   =>  '0945321487',
                    'dia_chi' => '47 Phạm Văn Đồng - Mai Dịch - Cầu Giấy - Hà Nội'
                ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
