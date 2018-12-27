<?php
   
   namespace App\Http\Controllers;
   
   use App\Models\Operations;
   use App\Models\Accounts;
   use Illuminate\Http\Request;
   
   class TestController extends Controller
   {
      public static
      function test0()
      {
         return [Accounts ::find(2)->operations->last()->balance];
      }
   }
