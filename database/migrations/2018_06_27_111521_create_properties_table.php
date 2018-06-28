<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('propertyType');
            $table->string('registrationStatus');
            $table->string('propertySection');
            $table->string('propertyAddress')->nullable();
            $table->string('propertyLocation')->nullable();
            $table->string('propertySize');
            $table->tinyInteger('jointProperty')->default(0)->nullable();
            $table->integer('noOfJointApplicant')->nullable();
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
        Schema::dropIfExists('properties');
    }
}