<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tokenHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tokenPayment','propertyId',
     ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
