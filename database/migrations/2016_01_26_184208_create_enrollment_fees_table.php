<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_fees', function (Blueprint $table) {
            $table->increments('id');

            // Each fee belongs to a enrollment
            $table->integer('enrollment_id')->unsigned();
            $table->foreign('enrollment_id')->references('id')->on('enrollments');

            // The fee value
            $table->float('amount');

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
        Schema::drop('enrollment_fees');
    }
}
