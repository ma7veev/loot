<?php
   
   namespace App\Models;
   
   use Illuminate\Database\Eloquent\Model;
   
   class Operations extends Model
   {
      protected $table   = 'operations';
      protected $guarded = [];
      
      public
      function accounts()
      {
         return $this -> belongsTo('App\Models\Accounts', 'id', 'accounts_id');
      }
      
     
   }