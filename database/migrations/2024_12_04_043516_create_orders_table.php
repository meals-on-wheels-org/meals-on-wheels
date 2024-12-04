<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('orderDate'); // Date of the order
            // $table->decimal('totalPrice', 10, 2); // Total price of the order
            // $table->string('status'); // Status of the order (e.g., pending, completed)
            // $table->unsignedBigInteger('userId'); // Foreign key for the user
            $table->unsignedBigInteger('deliveryId'); // Foreign key for delivery
            $table->unsignedBigInteger('volunteerId'); // Foreign key for volunteer
            $table->unsignedBigInteger('memberId'); // Foreign key for member
            $table->timestamps(); // Created_at and updated_at timestamps

            // Setting up foreign key constraints
            // $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deliveryId')->references('id')->on('deliveries')->onDelete('cascade');
            $table->foreign('volunteerId')->references('id')->on('volunteers')->onDelete('cascade');
            $table->foreign('memberId')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
