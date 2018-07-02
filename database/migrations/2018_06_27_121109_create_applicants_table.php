<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fatherName');
            $table->string('cnicNo');
            $table->string('passportNo');
            $table->string('mailingAddress');
            $table->string('permanentAddress');
            $table->string('email');
            $table->string('phoneNO');
            $table->string('mobileNo1');
            $table->string('mobileNo2')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('nomineeName');
            $table->string('nomineeFatherName');
            $table->string('relationWithApplicant');
            $table->string('nomineeCnicNo');
            $table->string('nomineePassportNo')->nullable();
            $table->string('nomineeMailingAddress')->nullable();
            $table->string('nomineePermanentAddress')->nullable();
            $table->string('nomineeMail')->nullable();
            $table->string('nomineePhoneNo')->nullable();
            $table->string('nomineeMobileNo1')->nullable();
            $table->string('nomineeMobileNo2')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
