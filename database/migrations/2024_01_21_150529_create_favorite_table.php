<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tạo bảng lưu trữ thông tin sản phẩm yêu thích
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            // Unique constraint để đảm bảo mỗi sản phẩm chỉ có một bản ghi trong bảng favorites
            $table->unique(['user_id', 'product_id']);

            // Khóa ngoại để liên kết với bảng users và bảng products
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Xóa bảng favorites nếu nó tồn tại
        Schema::dropIfExists('favorites');
    }
};
