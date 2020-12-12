<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('prod_name');
            $table->double('prod_cost');
            $table->string('prod_img');
            $table->string('prod_description'); 
            $table->string('prod_DRC');             //dai * rong * cao
            $table->string('prod_Weight');          //trong luong
            $table->string('prod_Engine');          //dong co 
            $table->string('prod_HorsePower');      //ma luc
            $table->string('prod_MaxCapacity');     //cong suat cuc dai
            $table->string('prod_MaxTorque');       //mo men xoan cuc dai
            $table->string('prod_Acceleration');    //tang toc
            $table->string('prod_MaxSpeed');        //van toc toi da
            $table->string('prod_TypeOfFuel');      //loai nhien lieu
            $table->string('prod_City');            //tiet liem nhien lieu trong thanh pho
            $table->string('prod_Combine');         //tiet kiem nhien lieu trong thanh pho va ngoai thanh pho
            $table->string('prod_Local');           //tiet kiem nhien lieu ngoai thanh pho
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
