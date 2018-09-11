<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaidinstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paidinstallments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('paidinstallment')->nullable();
            $table->integer('remeaninginstallment')->nullable();
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
        Schema::dropIfExists('paidinstallments');
    }
}
