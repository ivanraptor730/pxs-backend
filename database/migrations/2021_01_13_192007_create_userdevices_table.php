<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdevices', function (Blueprint $table) {
            /**Seperated for db normalization */
            $table->id();
            $table->biginteger('owner')->unsigned();
            $table->biginteger('device')->unsigned();
            $table->timestamps();


            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('device')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdevices');
    }
}
