<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_case_id');
            $table->unsignedBigInteger('project_id');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('failed_step_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('project_case_id')->references('id')->on('project_cases');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('failed_step_id')->references('id')->on('steps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_logs');
    }
}
