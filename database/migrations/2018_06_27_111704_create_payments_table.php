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
            $table->integer('propertyPrice');// total amount 
            $table->string('propertyPaymentType')->nullable();
            $table->string('transferTo')->nullable();
            $table->string('bankName')->nullable();
            $table->string('propertyPurchingDate');
            $table->string('propertyPaymentProcedure');  //instalment          
            $table->string('paymentType'); 
            $table->string('paymentMethod')->nullable();
            $table->dateTime('bookingDate')->nullable();
            $table->string('chequeNo')->nullable();
            $table->string('totalAmount')->nullable();   
            $table->string('initialDeposite')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
