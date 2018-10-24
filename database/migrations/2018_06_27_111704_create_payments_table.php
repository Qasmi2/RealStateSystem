<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('propertyPaymentType')->nullable();
            $table->string('transferTo')->nullable();
            $table->string('bankName')->nullable();
            $table->string('chequeno')->nullable();
            $table->string('propertyPurchingDate');
            $table->integer('propertyPrice');// total amount 
            $table->string('propertyPaymentProcedure');  //instalment or Total amount          
            $table->string('paymentType'); 
            $table->integer('propertyId')->unsigned();
            $table->integer('userId')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
