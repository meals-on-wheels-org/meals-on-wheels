<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Volunteer name
            $table->string('availability'); // Volunteer availability (e.g., part-time, full-time)
            $table->unsignedBigInteger('deliveryTrackingId'); // Foreign key for route
            $table->unsignedBigInteger('adminId'); // Foreign key for admin
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('deliveryTrackingId')->references('id')->on('deliveryTracking')->onDelete('cascade');
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
        Schema::dropIfExists('volunteers');
    }
}
