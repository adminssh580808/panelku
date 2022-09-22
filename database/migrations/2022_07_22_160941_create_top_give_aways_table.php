<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopGiveAwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_give_aways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name1');
            $table->string('code1');
            $table->integer('total1');
            $table->string('name2');
            $table->string('code2');
            $table->integer('total2');
            $table->string('name3');
            $table->string('code3');
            $table->integer('total3');
            $table->string('name4');
            $table->string('code4');
            $table->integer('total4');
            $table->string('name5');
            $table->string('code5');
            $table->integer('total5');
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
        Schema::dropIfExists('top_give_aways');
    }
}
