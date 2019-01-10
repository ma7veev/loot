<?php
   use App\Models\Items;
   use App\Models\Operations;
   use App\Models\Groups;
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
   /* PAGES RENDERING*/
   Route ::get('/', function()
   {
      return view('welcome');
   });
   Route ::get('/operations', function()
   {
      return view('operations');
   }) -> name('operations');
   Route ::get('/accounts', function()
   {
      return view('accounts');
   }) -> name('accounts');
   Route ::get('/items', function()
   {
      return view('items');
   }) -> name('items');
   Route ::get('/groups', function()
   {
      return view('groups');
   }) -> name('groups');
   Route ::get('/accounts-balance', function()
   {
      return view('accounts-balance');
   }) -> name('accounts-balance');
   Route ::get('/test0', 'TestController@test0');
   /**/
   /**/
   /**/
   /**/
   /**/
   /**/
   /*GET DATA METHODS*/
   Route ::get('/get-accounts-list', function()
   {
      return json_encode(Accounts ::select([
            'name',
            'id']) -> where('deleted', 0) -> get());
   });
   Route ::get('/get-groups-list', function()
   {
      return json_encode(Groups ::select([
            'name',
            'id']) -> where('deleted', 0) -> get());
   });
   Route ::get('/get-items-list', function()
   {
      return json_encode(Items ::select([
            'name',
            'id']) -> where('deleted', 0) -> get());
   });
   Route ::get('/get-operations-data', function(Request $request)
   {
      return json_encode(Operations ::select([
            'id',
            'items_id',
            'comment',
            'amount',
            'created_at']) -> where('deleted', 0) -> get());
   });
   Route ::get('/get-accounts-data', function(Request $request)
   {
      return json_encode(Accounts ::select([
            'id',
            'name',
            'comment',]) -> where('deleted', 0) -> get());
   });
   Route ::get('/get-items-data', function(Request $request)
   {
      return json_encode(Items ::select([
            'id',
            'name',
            'groups_id',
            'type',
            'comment',]) -> where('deleted', 0) -> get());
   });
   Route ::get('/get-groups-data', function(Request $request)
   {
      return json_encode(Groups ::select([
            'id',
            'name',
            'comment',]) -> where('deleted', 0) -> get());
   });
   /*SAVE DATA METHODS*/
   Route ::get('/save-operation', function(Request $request)
   {
   });
   Route ::get('/save-operation', 'OperationsController@save');
   Route ::get('/save-account', function(Request $request)
   {
      Accounts ::firstOrCreate($request -> toArray());
   });
   Route ::get('/save-item', function(Request $request)
   {
      Items ::firstOrCreate($request -> toArray());
   });
   Route ::get('/save-group', function(Request $request)
   {
      Groups ::firstOrCreate($request -> toArray());
   });
   /*DELETING DATA*/
   /*SAVE DATA METHODS*/
   Route ::get('/delete-operation', function(Request $request)
   {
      Operations ::where('id', $request -> id) -> update(['deleted' => 1]);
      if (Operations ::find($request -> id) -> deleted)
      {
         return 1;
      }
   });
   Route ::get('/delete-account', function(Request $request)
   {
      // dd($request -> id);
      Accounts ::where('id', $request -> id) -> update(['deleted' => 1]);
      if (Accounts ::find($request -> id) -> deleted)
      {
         return 1;
      }
   });
   Route ::get('/delete-item', function(Request $request)
   {
      Items ::where('id', $request -> id) -> update(['deleted' => 1]);
      if (Items ::find($request -> id) -> deleted)
      {
         return 1;
      }
   });
   Route ::get('/delete-group', function(Request $request)
   {
      Groups ::where('id', $request -> id) -> update(['deleted' => 1]);
      if (Groups ::find($request -> id) -> deleted)
      {
         return 1;
      }
   });
   
