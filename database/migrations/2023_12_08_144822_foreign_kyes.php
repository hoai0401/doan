<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // products
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('image_id')->references('id')->on('images');
        });

        // comments
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('commennt_id')->references('id')->on('comments');
        });

        // invoices
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        // invoice_details
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('product_id')->references('id')->on('products');
        });

        // product_details
        Schema::table('product_details', function (Blueprint $table) {
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('color_id')->references('id')->on('colors');
        });

        // carts
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('product_details');
        });
    }
    public function down()
    {
        //
    }
};
