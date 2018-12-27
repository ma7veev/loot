<?php
   
   namespace App\Http\Controllers;
   
   use App\Models\Items;
   use App\Models\Operations;
   use App\Models\Accounts;
   use Illuminate\Http\Request;
   
   class OperationsController extends Controller
   {
      public static
      function save(Request $request)
      {
         $save_data = $request -> toArray();
         
         $operations = Operations ::where('accounts_id', $request -> accounts_id) -> get();
         
         $account = Accounts ::find($request -> accounts_id);
         
         $item = Items ::find($request -> items_id);
         
         $sign = ((boolean)$item -> type) ? 1 : -1;
         if ($operations -> isNotEmpty())
         {
            $save_data[ 'balance' ] = ($account -> operations -> last() -> balance)+($request -> amount*$sign);
         }
         else
         {
            $save_data[ 'balance' ] = ($account -> initial)+($request -> amount*$sign);
         }
         // dd($save_data);
         Operations ::firstOrCreate($save_data);
      }
   }
