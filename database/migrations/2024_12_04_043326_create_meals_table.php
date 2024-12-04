<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name')->nullable(false); // Meal name
            $table->text('description')->nullable(false); // Optional description
            $table->string('dietaryPreferences')->nullable(); // modified to dietay _prferences
            // $table->decimal('price', 8, 2); // Price of the meal
            $table->integer('quantity')->default(0); // Quantity in stock
            $table->text('ingredients')->nullable(); // List of ingredients
            $table->unsignedBigInteger('menu_id'); // Foreign Key for menu
            $table->unsignedBigInteger('order_id'); // Foreign Key for order
            $table->timestamps(); // Created_at and Updated_at timestamps

            // Setting up foreign key constraints
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}

