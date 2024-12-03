<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fundraising', function (Blueprint $table) {
            $table->id();
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('funds_raised', 10, 2)->default(0);
            $table->integer('donors')->default(0);
            $table->integer('meals_funded')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fundraising');
    }
};

