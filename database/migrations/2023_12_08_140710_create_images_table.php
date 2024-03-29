<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->timestamps();
            $table->softDeletes();  
            $table->unsignedBigInteger('product_id')->nullable()->default(null);
        });
    }
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
