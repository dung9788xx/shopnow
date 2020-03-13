<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->bigIncrements('store_id');
            $table->string("name",255);
            $table->text("description");
            $table->tinyInteger("approval")->default(0);
            $table->tinyInteger("notification")->default(0);
            $table->tinyInteger("blocked")->default(0);
            $table->bigInteger("user_id");
            $table->bigInteger("location_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
    }
}
