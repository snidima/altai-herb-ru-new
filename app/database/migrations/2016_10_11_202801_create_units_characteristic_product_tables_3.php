<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsCharacteristicProductTables3 extends Migration
{


    public function up()
    {

        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->string('unit');
            $table->unique(array('slug'));
            $table->timestamps();
        });


        Schema::create('characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unit')->unsigned();
            $table->foreign('id_unit')->references('id')->on('units');
            $table->string('value');
            $table->unique(array('id_unit', 'value'));
            $table->timestamps();
        });

        Schema::create('characteristic_product', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_characteristic')->unsigned();
            $table->foreign('id_characteristic')->references('id')->on('characteristics');

            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');

            $table->unique(array('id_characteristic', 'id_product'));
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('units');
        Schema::dropIfExists('characteristics');
        Schema::dropIfExists('characteristic_product');
    }


}
