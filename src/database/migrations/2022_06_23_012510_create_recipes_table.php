<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->integer('categoryId');
            $table->text('recipeTitle');
            $table->text('recipeUrl');
            $table->text('foodImageUrl');
            $table->text('mediumImageUrl');
            $table->text('smallImageUrl');
            $table->text('nickname');
            $table->text('recipeDescription');
            $table->text('recipeIndication');
            $table->text('recipeCost');
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
        Schema::dropIfExists('recipes');
    }
}
