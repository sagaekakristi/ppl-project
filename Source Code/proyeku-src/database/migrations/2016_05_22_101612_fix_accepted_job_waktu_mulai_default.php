<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixAcceptedJobWaktuMulaiDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accepted_job', function ($table) {
            $table->dropColumn('waktu_mulai');
        });

        Schema::table('accepted_job', function ($table) {
            $table->timestamp('waktu_mulai')->useCurrent();
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
