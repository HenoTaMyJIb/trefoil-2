<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymnastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gymnasts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable()->index();
            $table->integer('parent1_id')->unsigned()->nullable();
            $table->integer('parent2_id')->unsigned()->nullable();
            $table->integer('club_id')->unsigned()->index();
            $table->integer('group_id')->unsigned()->index();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gymnasts');
    }
}
