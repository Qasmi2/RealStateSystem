<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('installmentNo')->nullable();
            $table->integer('installmentAmount')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('installmentPaymentDate')->nullable();
            $table->string('remaningInstallments')->nullable();
            $table->dateTime('nextInstallmentDate')->nullable();
            $table->integer('remaingAmount')->nullable();
            $table->integer('propertyId')->unsigned();
            $table->foreign('propertyId')->references('id')->on('properties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installment_histories');
    }
}
