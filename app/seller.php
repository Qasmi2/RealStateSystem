<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sallerName','sallerCnicNo','sallerFatherName','sallerDesignation','sallerAddress',
    
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         
     ];
}
