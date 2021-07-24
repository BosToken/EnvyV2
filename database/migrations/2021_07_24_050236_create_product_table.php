<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name_product');
            $table->string('description_product');
            $table->string('image_product');
            $table->integer('quantity_product');
            $table->integer('price_product');
            $table->integer('gender_id');
            $table->integer('type_id');
            $table->string('size');
            $table->string('color');
            $table->integer('archive');
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
