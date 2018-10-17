<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang');
            $table->unsignedInteger('work_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();

            $table->foreign('work_id')
                  ->references('id')->on('works')
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
        Schema::dropIfExists('work_translates');
    }
}
