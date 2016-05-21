<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alterfreelancerinfoskill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::drop('freelancer_info_skill');
        
        Schema::create('freelancer_info_skill', function($newTable){
            $newTable->integer('freelancer_info_id')->unsigned();
            $newTable->string('skill', 255);
            
            $newTable->foreign('freelancer_info_id')->references('user_info_id')->on('freelancer_info');
            $newTable->primary(['freelancer_info_id', 'skill']);
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

    }
}
