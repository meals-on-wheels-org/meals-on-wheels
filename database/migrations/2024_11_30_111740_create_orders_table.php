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
    Schema::create('orders', function (Blueprint $table) {
        $table->id(); // Primary Key
        $table->unsignedBigInteger('user_id'); // Foreign Key
        $table->unsignedBigInteger('meal_id'); // Foreign Key
        $table->datetime('order_date');
        $table->enum('status', ['Pending', 'Delivered', 'Cancelled']);
        $table->decimal('total_price', 10, 2)->default(0.00);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
