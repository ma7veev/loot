<?php
   use App\Models\Items;
   use App\Models\Operations;
   use App\Models\Accounts;
   use Illuminate\Http\Request;
   
   /*
   |--------------------------------------------------------------------------
   | Web Routes
   |--------------------------------------------------------------------------
   |
   | Here is where you can register web routes for your application. These
   | routes are loaded by the RouteServiceProvider within a group which
   | contains the "web" middleware group. Now create something great!
   |
   */
   Route ::get('/', function()
   {
      return view('welcome');
   });
   Route ::get('/operations', function()
   {
      return view('operations');
   });
   Route ::get('/accounts', function()
   {
      return view('accounts');
   });
   Route ::get('/items', function()
   {
      return view('items');
   });
   Route ::get('/get-items', function()
   {
      return json_encode(Items ::select([
            'name',
            'id']) -> get());
   });
   Route ::get('/save-operation', function(Request $request)
   {
      Operations::firstOrCreate($request -> toArray());
   });
   Route ::get('/save-account', function(Request $request)
   {
      Accounts::firstOrCreate($request -> toArray());
   });
   Route ::get('/get-last-operations', function(Request $request)
   {
      return json_encode(Operations ::select([
            'items_id',
            'comment',
            'amount',
            'created_at']) -> get());
   });
   Route ::get('/get-all-accounts', function(Request $request)
   {
      return json_encode(Accounts ::select([
            'name',
            'comment',]) -> get());
   });
