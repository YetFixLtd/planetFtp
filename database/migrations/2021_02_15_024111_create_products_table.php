<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId');
            $table->integer('SubCategoryId');
            $table->string('productTitle');
            $table->text('productDescription');
            $table->text('productFile')->nullable();
            $table->text('productUrl')->nullable();
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
        Schema::dropIfExists('products');
    }
}
