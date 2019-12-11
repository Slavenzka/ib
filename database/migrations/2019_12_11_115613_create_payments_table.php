<?php

use App\Models\Base;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->unsignedInteger('holder_id')->nullable();
            $table->float('amount', 12, 4);
            $table->enum('currency', Base::$currencies);
            $table->enum('method', Base::$paymentMethods);
            $table->timestamps();

            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('set null');
            $table->foreign('holder_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
