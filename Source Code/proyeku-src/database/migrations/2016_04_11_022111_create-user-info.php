<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creaete table user-info
        Schema::create('user_info', function($newTable){
            $newTable->integer('user_id')->unsigned();
            $newTable->date('tanggal_lahir');
            $newTable->string('alamat',255);
            $newTable->string('jenis_kelamin',1);

            $newTable->foreign('user_id')->references('id')->on('users');
            $newTable->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop table for back to revision
        if (Schema::hasTable('user_info'))
        {
            Schema::drop('user_info');
        }
    }
}
