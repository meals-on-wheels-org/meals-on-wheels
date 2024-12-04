<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->enum('status', ['pending', 'delivered', 'canceled'])->default('pending'); // Delivery status (e.g., pending, completed) , 
            $table->unsignedBigInteger('volunteerId'); // Foreign key for volunteer
            $table->unsignedBigInteger('adminId'); // Foreign key for admin
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('volunteerId')->references('id')->on('volunteers')->onDelete('cascade');
            $table->foreign('adminId')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
