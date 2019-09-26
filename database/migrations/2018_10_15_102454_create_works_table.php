<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->json('title');
            $table->json('body');
            $table->json('description')->nullable();
            $table->unsignedInteger('type_id');
            $table->boolean('in_slideshow')->default(1);
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('work_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
