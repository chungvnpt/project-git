<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('cate_id');
            $table->integer('subcate_id');
            $table->integer('mutil_price');
            $table->integer('mutil_number');
            $table->integer('one_price');
            $table->integer('COD');
            $table->integer('type');
            $table->integer('user_id');
            $table->string('images');
            $table->string('field_extra');
            $table->string('note');
            $table->string('sale_price');
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
        Schema::dropIfExists('item');
    }
}
