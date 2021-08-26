<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->nullable()->constrained();
            $table->foreignId('group_id')->constrained();
            $table->smallInteger('scored')->default(0);
            $table->smallInteger('conceded')->default(0);
            $table->smallInteger('win')->default(0);
            $table->smallInteger('draw')->default(0);
            $table->smallInteger('lost')->default(0);
            $table->integer('points')->default(0);
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
        Schema::dropIfExists('club_group');
    }
}
