<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class installment extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'noOfInstallments','installmentAmount','installmentDated','propertyId',
        
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
