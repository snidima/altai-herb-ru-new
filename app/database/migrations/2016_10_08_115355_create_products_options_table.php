<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsOptionsTable extends Migration
{


    public function up()
    {
        Schema::create('products_options', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->string('slug');
            $table->string('name');
            $table->string('value');
            $table->unique(array('slug', 'value'));
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products_options');
    }


}
