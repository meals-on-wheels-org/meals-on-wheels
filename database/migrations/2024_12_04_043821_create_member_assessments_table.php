<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_assessments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('lastAssessmentDate'); // Last assessment date
            $table->boolean('needsReassessment')->default(false); // Whether reassessment is needed
            $table->unsignedBigInteger('userId'); // Foreign key linking to the users table
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraint
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_assessments');
    }
}
