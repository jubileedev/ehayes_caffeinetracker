<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('drinker_id');
            $table->unsignedBigInteger('beverage');
            $table->unsignedBigInteger('servings');
            $table->unsignedBigInteger('caffeine_cost');
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
        Schema::dropIfExists('drinker');
    }
}
