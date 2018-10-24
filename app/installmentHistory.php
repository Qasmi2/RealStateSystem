<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class installmentHistory extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'installmentNo','installmentAmount','status','installmentPaymentDate','remaningInstallments',
        'nextInstallmentDate','remaingAmount','userId','propertyId',
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}