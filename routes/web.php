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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::match(['get', 'post'], '/', 'UserController@login')->name('login');
Route::group(['middleware' => ['auth']], function () { 
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('user/{id?}', 'HomeController@user')->name('user');
    Route::get('list', 'HomeController@list')->name('list');
    Route::match(['put', 'post'], 'user/{id?}' ,'HomeController@userAction')->name('userAction');
    Route::get('logout', 'HomeController@logout')->name('logout');
});
Route::group(['middleware' => ['auth', 'admin']], function () { 
    Route::get('admin', 'HomeController@admin')->name('admin');
});
