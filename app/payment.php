<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'propertyPrice','propertyPaymentType','transferTo','bankName','chequeno',
        'propertyPurchingDate','propertyPaymentProcedure','paymentType','paymentMethod',
        'bookingDate','chequeNo','totalAmount','initialDeposite',
        'propertyId',
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
