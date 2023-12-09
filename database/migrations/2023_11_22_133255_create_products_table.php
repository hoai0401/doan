<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->text('description');
        $table->bigInteger('price');
        $table->integer('stock_quantity');
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('image_id')->nullable()->default(null);
        $table->timestamps();
        $table->softDeletes();
    });
}

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
