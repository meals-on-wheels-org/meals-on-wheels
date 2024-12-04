<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name')->nullable(false); // name of the member
            $table->enum('eligibilityStatus', ['Eligible','not eligible'])->default('not eligible'); // Eligibility status of the member
            $table->text('address'); // Address of the member
            $table->string('phone'); // Phone number of the member
            $table->string('dietryPreferences')->nullable(); // dietry preferences
            $table->string('disabilities')->nullable(); // checks for disabilities
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
