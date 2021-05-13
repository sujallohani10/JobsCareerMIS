<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_desc');
            $table->text('job_requirements')->nullable();
            $table->string('job_qualification')->nullable();
            $table->string('job_experience')->nullable();
            $table->date('job_expiry_date');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('career_level');
            $table->string('job_type');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->integer('category_id')->references('id')->on('job_categories')->cascadeOnDelete();
            $table->integer('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('verified_by')->references('id')->on('users')->cascadeOnDelete()->nullable();
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
