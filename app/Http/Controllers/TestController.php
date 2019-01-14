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
         return AccountsBalanceController::calculate(3);
      }
   }
