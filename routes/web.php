<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/operations', function () {
    return view('operations');
});
Route::get('/accounts', function () {
    return view('accounts');
});
Route::get('/items', function () {
    return view('items');
});
