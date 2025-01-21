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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->date('birth_date');
            $table->string('contact');
            $table->string('address');
            $table->string('nationality');
            $table->string('religion');
            $table->string('civil_status');
            $table->string('resume');
            $table->string('refered_by')->nullable();
            $table->string('job_position');
            $table->string('status')->default('applicant');
            $table->string('score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
