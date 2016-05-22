<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcceptedSepakatDuaArah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accepted_job', function ($table) {
            $table->boolean('freelancer_confirm_done');
            $table->boolean('seeker_confirm_done');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accepted_job', function($table)
        {
            $table->dropColumn('freelancer_confirm_done');
            $table->dropColumn('seeker_confirm_done');
        });
    }
}
