<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('id');

            // Student who will be enrolled
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // Season
            $table->integer('school_year_id')->unsigned();
            $table->foreign('school_year_id')->references('id')->on('school_years');

            // Career
            $table->integer('career_id')->unsigned();
            $table->foreign('career_id')->references('id')->on('careers');

            // Grade: I, II, III, IV, V, VI
            $table->integer('academic_year');

            // Status
            // 0: Pending payment
            // 1: Complete payment
            $table->boolean('status');

            // The payment value
            $table->float('amount');

            $table->string('observations');

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
        Schema::drop('enrollments');
    }
}
