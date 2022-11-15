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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'SiteController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/welcome/{locale}', 'SiteController@setlocale')->name('setlocale');
// Change Password Routes...
Route::get('/showChangePasswordForm', 'ChangePasswordController@showChangePasswordForm')->name('showChangePasswordForm');
Route::post('/change_password', 'ChangePasswordController@changePassword')->name('change_password');

Route::get('/index', 'UserController@index')->name('user_index');
Route::get('/create', 'UserController@create')->name('user_create');
Route::post('/index', 'UserController@store')->name('user_store');
Route::get('/index/{id}', 'UserController@update')->name('user_update');
Route::get('/index/{id}', 'UserController@destroy')->name('user_destroy');
Route::get('/home/{lang}', 'UserController@preferred_language')->name('preferred_language');