<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTvSeriesFileToTvSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tv_series', function (Blueprint $table) {
            $table->text('tvSeriesFile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tv_series', function (Blueprint $table) {
            $table->dropColumn('tvSeriesFile');
        });
    }
}
