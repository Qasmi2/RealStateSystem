<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paidinstallment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paidinstallment','remeaninginstallment','propertyId',
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
