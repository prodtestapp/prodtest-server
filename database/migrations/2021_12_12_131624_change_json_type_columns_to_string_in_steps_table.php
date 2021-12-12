<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeJsonTypeColumnsToStringInStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->dropColumn('headers');
            $table->dropColumn('body');
            $table->dropColumn('validator_schema');
        });

        Schema::table('steps', function (Blueprint $table) {
            $table->text('headers')->nullable();
            $table->text('body')->nullable();
            $table->text('validator_schema')->nullable();
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
