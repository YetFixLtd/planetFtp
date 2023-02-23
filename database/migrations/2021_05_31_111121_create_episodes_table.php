<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->integer('SubCategoryId');
            $table->integer('tvSeriesId');
            $table->integer('seasonId');
            $table->text('episodeTitle');
            $table->text('episodeDescription');
            $table->text('episodeFile')->nullable();
            $table->text('episodeUrl')->nullable();
            $table->text('rating')->nullable();
            $table->text('year')->nullable();
            $table->tinyInteger('publicationStatus');
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
        Schema::dropIfExists('episodes');
    }
}
