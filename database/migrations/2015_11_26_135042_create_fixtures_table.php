<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matchdayID');
            $table->string('homeTeam');
            $table->string('awayTeam');
            $table->string('status');
            $table->dateTime('fixtureTime');
            $table->integer('goalsHome')->nullable();
            $table->integer('goalsAway')->nullable();

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
        Schema::drop('fixtures');
    }
}
