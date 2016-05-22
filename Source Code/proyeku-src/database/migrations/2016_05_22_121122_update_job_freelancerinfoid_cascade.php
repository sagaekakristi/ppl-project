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
            $table->dropForeign(['job_id']);
            $table->foreign('job_id')
            ->references('id')->on('job')
            ->onDelete('cascade')
            ->onUpdate('cascade')
            ->change();

            $table->dropForeign(['category_id']);
            $table->foreign('category_id')
            ->references('id')->on('category')
            ->onDelete('cascade')
            ->onUpdate('cascade')
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
            $table->dropForeign(['job_id']);
            $table->foreign('job_id')
            ->references('id')->on('job')
            ->onDelete('restrict')
            ->onUpdate('restrict')
            ->change();

            $table->dropForeign(['category_id']);
            $table->foreign('category_id')
            ->references('id')->on('category')
            ->onDelete('restrict')
            ->onUpdate('restrict')
            ->change();
        });
    }
}
