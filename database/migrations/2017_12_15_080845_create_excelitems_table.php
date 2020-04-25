<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcelitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excelitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading',100); // рубрика
            $table->integer('category_id');
            $table->string('company',100);
            $table->string('name',255);
            $table->string('code',10);
            $table->text('description');
            $table->decimal('price',10,2);
            $table->string('termGuarantee',50);
            $table->string('sclad',20);
            $table->string('linkToGood',255);
            $table->string('linkToPhoto',255);
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
        Schema::dropIfExists('excelitems');
    }
}
