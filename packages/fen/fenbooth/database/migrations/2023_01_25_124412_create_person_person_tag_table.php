<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonPersonTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_person_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('person_tag_id');
            // $table->foreign('person_id')->references('id')->on('person');
            // $table->foreign('person_tag_id')->references('id')->on('person_tag');
            $table->unique(['person_id', 'person_tag_id']);
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
        Schema::dropIfExists('person_person_tag');
    }
}
