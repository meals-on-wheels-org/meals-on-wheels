<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('donations', function (Blueprint $table) {
        $table->id(); // Primary Key
        $table->unsignedBigInteger('donor_id'); // Foreign Key
        $table->decimal('amount', 10, 2);
        $table->datetime('date');
        $table->timestamps();

        $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade'); // Assuming donors are users
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
