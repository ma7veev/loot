<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
   protected $table = 'accounts';
   protected $guarded = [];
   
   public
   function operations()
   {
      return $this -> hasMany('App\Models\Operations', 'accounts_id', 'id');
   }
}
