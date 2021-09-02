<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id');
            $table->foreignId('group_id');
            $table->foreignId('home_id');
            $table->foreignId('away_id');
            $table->date('date')->default(date(now()));
            $table->string('time')->default('00:00');
            $table->tinyInteger('hscore')->default('0');
            $table->tinyInteger('ascore')->default('0');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('games');
    }
}
