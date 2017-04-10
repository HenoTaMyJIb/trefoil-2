<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable()->index();
            $table->integer('parent1_id')->unsigned()->nullable()->index();
            $table->integer('parent2_id')->unsigned()->nullable()->index();
            $table->integer('field_id')->unsigned()->nullable()->index();
            $table->text('comment')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
