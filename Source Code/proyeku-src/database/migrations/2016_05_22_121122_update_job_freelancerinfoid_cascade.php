<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJobFreelancerinfoidCascade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_category', function ($table) {
            $table->dropForeign(['job_id', 'category_id']);
            $table->foreign('job_id')
            ->references('id')->on('job')
            ->onDelete('cascade')
            ->change();

            $table->foreign('category_id')
            ->references('id')->on('category')
            ->onDelete('cascade')
            ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_category', function ($table) {
            $table->dropForeign(['job_id', 'category_id']);
            $table->foreign('job_id')
            ->references('id')->on('job')
            ->onDelete('restrict')
            ->change();

            $table->foreign('category_id')
            ->references('id')->on('category')
            ->onDelete('restrict')
            ->change();
        });
    }
}
