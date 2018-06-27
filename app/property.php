<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'propertyType','registrationStatus','propertySection','propertyAddress','propertyLocation','propertySize','jointProperty','noOfJointApplicant',
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
