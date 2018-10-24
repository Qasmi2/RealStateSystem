<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approval extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'userId','status','propertyId'
        
     ];

    //  protected $casts = [
    //     'installmentDates' => 'json'
    // ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
