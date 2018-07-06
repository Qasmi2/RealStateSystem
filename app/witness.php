<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class witness extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'witnessName','witnessCnicNo','propertyId',
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];

}
