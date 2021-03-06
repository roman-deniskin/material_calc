<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_stock', function (Blueprint $table) {
            $table->integer('material_id')->unsigned()->index();
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');;
            $table->integer('detail_id')->unsigned()->nullable()->index();
            $table->foreign('detail_id')->references('id')->on('details')->onDelete('cascade');
            //$table->integer('product_id')->unsigned();
            //$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->double('amount')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials_stock');
    }
}
