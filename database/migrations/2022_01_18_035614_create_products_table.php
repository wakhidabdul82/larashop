<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('title',64);
            $table->text('description');
            $table->string('sku');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->integer('stock');
            $table->integer('regular_price');
            $table->integer('promo_price');
            $table->string('image');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->timestamps();
        });
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
}
