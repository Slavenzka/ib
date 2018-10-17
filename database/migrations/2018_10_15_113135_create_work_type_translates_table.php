<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTypeTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_type_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang');
            $table->unsignedInteger('type_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('type_id')
                  ->references('id')->on('work_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_type_translates');
    }
}
