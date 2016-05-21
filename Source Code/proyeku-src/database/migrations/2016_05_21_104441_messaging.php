<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messaging extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creaete table message
        Schema::create('message', function($newTable){
            $newTable->increments('id');
            $newTable->integer('sender_user_id')->unsigned();
            $newTable->integer('receiver_user_id')->unsigned();
            $newTable->text('message_content');
            $newTable->timestamps();

            $newTable->foreign('sender_user_id')->references('id')->on('users');
            $newTable->foreign('receiver_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop message table
        Schema::drop('message');
    }
}
