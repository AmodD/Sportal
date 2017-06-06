<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formats', function (Blueprint $table) {
		$table->increments('id');
		$table->unsignedSmallInteger('sport_id');
		$table->string('name');
		$table->text('description');
		$table->boolean('individual');// 1-singles,  0- not singles
		$table->boolean('squad');// 1- more than 3 members ,  0- doubles 
		$table->boolean('competitors');// 1-std two competitors , 0-multiple participants
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
        Schema::dropIfExists('formats');
    }
}
