<?php
   
   namespace App\Http\Controllers;
   
   use App\Models\Items;
   use App\Models\Operations;
   use App\Models\Accounts;
   use Illuminate\Http\Request;
   
   class AccountsBalanceController extends Controller
   {
      public static
      function listing()
      {
         $accounts = Accounts ::where('deleted', 0)
                              -> get();
         $accounts=$accounts -> transform(function($item, $key)
         {
            $item -> result = self ::calculate($item -> id);
            
            return $item;
         });
         return $accounts;
      }
      
      public static
      function calculate($accounts_id)
      {
         $income_operations = Operations ::leftJoin('items', 'items_id', '=', 'items.id')
                                         -> where('operations.accounts_id', '=', $accounts_id)
                                         -> where('items.type', '=', 1)
                                         -> where('operations.deleted', '=', 0)
                                         -> get();
         $outcome_operations = Operations ::leftJoin('items', 'items_id', '=', 'items.id')
                                          -> where('operations.accounts_id', '=', $accounts_id)
                                          -> where('items.type', '=', 0)
                                          -> where('operations.deleted', '=', 0)
                                          -> get();
         $account = Accounts ::find($accounts_id);
         $sum = $income_operations -> sum('amount');
         $substance = $outcome_operations -> sum('amount');
         $initial = $account -> initial;
         $result = $initial+$sum-$substance;
         
         return $result;
      }
   }
