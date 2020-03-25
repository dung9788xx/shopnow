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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements("product_id");
            $table->string("name");
            $table->text("description");
            $table->bigInteger("price");
            $table->bigInteger("amount");
            $table->bigInteger("store_id");
            $table->bigInteger("category_id");
            $table->tinyInteger("isSelling")->default(1);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
