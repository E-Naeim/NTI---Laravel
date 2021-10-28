<?php

use Illuminate\Support\Facades\Route;

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

Route::get('users/loginView', 'usersController@loginView');
Route::post('users/doLogin', 'usersController@doLogin');
Route::get('users/logOut', 'usersController@logOut')->middleware('usersAuth');



Route::resource('users', 'usersController');
Route::resource('to_do', 'to_doController');
