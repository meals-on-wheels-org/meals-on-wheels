<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Member Preferences Table
        Schema::create('member_preferences', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nutritional_needs'); // Nutritional needs column
            $table->string('delivery_preferences'); // Delivery preferences column
            $table->timestamps();
        });

        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id'); // Role ID column
            $table->text('preferences')->nullable(); // User preferences
            $table->unsignedBigInteger('member_preference_id')->nullable(); // Member Preferences ID
            $table->foreign('member_preference_id') // Add foreign key
                  ->references('id')
                  ->on('member_preferences')
                  ->onDelete('set null'); // Optional: handles deletion of related member preferences
            $table->rememberToken();
            $table->timestamps();
        });

        // Password Reset Tokens Table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions Table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('member_preferences');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
