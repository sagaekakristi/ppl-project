<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAccjob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // JOB TABLE FAMILY
        // job table
        Schema::create('job', function($newTable){
            $newTable->increments('id');
            $newTable->integer('freelancer_info_id')->unsigned();
            $newTable->string('judul', 255);
            $newTable->text('deskripsi');
            $newTable->integer('upah_max');
            $newTable->integer('upah_min');

            $newTable->foreign('freelancer_info_id')->references('user_info_id')->on('freelancer_info');
        });
        // category table
        Schema::create('category', function($newTable){
            $newTable->increments('id');
            $newTable->string('kategori', 255);
        });
        // job_category_entity table
        Schema::create('job_category', function($newTable){
            $newTable->increments('id');
            $newTable->integer('job_id')->unsigned();
            $newTable->integer('category_id')->unsigned();

            $newTable->foreign('job_id')->references('id')->on('job');
            $newTable->foreign('category_id')->references('id')->on('category');
        });

        // ACCEPTED_JOB TABLE FAMILY
        // accepted_job table
        Schema::create('accepted_job', function($newTable){
            $newTable->increments('id');
            $newTable->integer('job_id')->unsigned();
            $newTable->integer('seeker_id')->unsigned();

            $newTable->timestamp('waktu_mulai');
            $newTable->timestamp('waktu_selesai')->nullable(); // start as null
            $newTable->integer('status')->default(0); // 0 = in progress, 1 = complete
            $newTable->text('deskripsi');

            $newTable->foreign('job_id')->references('id')->on('job');
            $newTable->foreign('seeker_id')->references('user_id')->on('user_info');
        });
        // accepted_job_links
        Schema::create('accepted_job_links', function($newTable){
            $newTable->increments('id');
            $newTable->integer('accepted_job_id')->unsigned();

            $newTable->string('link', 255);
            $newTable->text('deskripsi');

            $newTable->foreign('accepted_job_id')->references('id')->on('accepted_job');
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
    }
}
