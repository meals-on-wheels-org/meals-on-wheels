<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveryTracking', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('startingPoint'); // Starting point of the route
            $table->string('endingPoint'); // Ending point of the route
            $table->string('routeName'); // Route name
            $table->integer('mealId'); //connect the meal table
            $table->timestamps(); // Created_at and updated_at timestamps

             // Setting up foreign key constraints
            $table->foreign('mealId')->references('id')->on('meals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
