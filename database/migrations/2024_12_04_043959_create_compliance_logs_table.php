<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_logs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('date'); // Date of the compliance log entry
            $table->string('metric'); // Compliance metric (may be a short text field or code)
            $table->unsignedBigInteger('complianceMetricId'); // Foreign key for compliance metrics
            $table->unsignedBigInteger('adminId'); // Foreign key for admin
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('complianceMetricId')->references('id')->on('compliance_metrics')->onDelete('cascade');
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
        Schema::dropIfExists('compliance_logs');
    }
}
