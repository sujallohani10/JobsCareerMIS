<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJobapplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_application', function (Blueprint $table) {
            $table->integer('status')->comment('1: Applied, 2: In Progress, 3: Shortlisted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_application', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
