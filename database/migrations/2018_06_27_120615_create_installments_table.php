<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('noOfInstallments')->nullable();
            $table->double('downpayment')->nullable();
            $table->double('amountOfOneInstallment', 8, 2)->nullable();
            $table->string('installmentDates')->nullable();
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
        Schema::dropIfExists('installments');
    }
}
