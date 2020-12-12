<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiImageProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_image_product', function (Blueprint $table) {
            $table->integer('prod_id')->unsigned();
            $table->foreign('prod_id')->references('prod_id')->on('products')->onDelete('cascade');
            $table->string('multi_img');
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
        Schema::dropIfExists('multi_image_product');
    }
}
