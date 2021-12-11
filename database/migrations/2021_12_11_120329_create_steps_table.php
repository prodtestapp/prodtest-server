<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_case_id');
            $table->string('key');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->json('headers')->nullable();
            $table->string('body_type')->nullable();
            $table->json('body')->nullable();
            $table->string('expected_status')->nullable();
            $table->boolean('use_validator')->default(false);
            $table->json('validator_schema')->nullable();
            $table->integer('order_no');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('project_case_id')->references('id')->on('project_cases');
            $table->unique(['project_case_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}
