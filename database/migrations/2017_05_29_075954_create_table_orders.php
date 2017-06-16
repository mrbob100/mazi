<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->float('sum');
            $table->boolean('status',2)->nullable();
            $table->string('firstname')->nullable();
            $table->string('secondname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
            $table->string('comment',255)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
