<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name1');
            $table->integer('total1');
            $table->string('name2');
            $table->integer('total2');
            $table->string('name3');
            $table->integer('total3');
            $table->string('name4');
            $table->integer('total4');
            $table->string('name5');
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
        Schema::dropIfExists('top_deposits');
    }
}
