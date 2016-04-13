<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creaete table user-info
        Schema::create('freelancer_info', function($newTable){
            $newTable->integer('user_info_id')->unsigned();
            $newTable->boolean('available');

            $newTable->foreign('user_info_id')->references('user_id')->on('user_info');
            $newTable->primary('user_info_id');
        });

        Schema::create('freelancer_info_skill', function($newTable){
            $newTable->integer('freelancer_info_id')->unsigned();
            $newTable->string('skill', 255);
            
            $newTable->foreign('freelancer_info_id')->references('user_info_id')->on('freelancer_info');
            $newTable->primary('freelancer_info_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop all table to back to revision
        if (Schema::hasTable('freelancer_info_skill'))
        {
            Schema::drop('freelancer_info_skill');
        }

        if (Schema::hasTable('freelancer_info'))
        {
            if (Schema::hasTable('accepted_job_links'))
            {
                Schema::drop('accepted_job_links');
            }

            if (Schema::hasTable('accepted_job'))
            {
                Schema::drop('accepted_job');
            }

            if (Schema::hasTable('job_category'))
            {
                Schema::drop('job_category');
            }

            if (Schema::hasTable('job'))
            {
                Schema::drop('job');
            }

            if (Schema::hasTable('category'))
            {
                Schema::drop('category');
            }
            Schema::drop('freelancer_info');
        }
    }
}
