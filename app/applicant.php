<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','fatherName','cnicNo','passportNo','mailingAddress','permanentAddress','email','phoneNO','mobileNo1','mobileNo2','pic',
        'nomineeName','nomineeFatherName','relationWithApplicant','nomineeCnicNo','nomineePassportNo','nomineeMailingAddress',
        'nomineePermanentAddress','nomineeMail','nomineePhoneNo','nomineeMobileNo1','nomineeMobileNo2','propertyId',
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ]; 
}
