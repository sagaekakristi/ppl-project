<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_request', function($newTable){
            $newTable->integer('job_id')->unsigned();
            $newTable->integer('seeker_id')->unsigned();

            $newTable->timestamps(); //Adds created_at and updated_at columns

            $newTable->foreign('job_id')->references('id')->on('job');
            $newTable->foreign('seeker_id')->references('id')->on('users');
            $newTable->primary(array('job_id', 'seeker_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if (Schema::hasTable('job_request'))
        {
            Schema::drop('job_request');
        }
    }
}
