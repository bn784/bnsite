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

Route::get('/home/{lang}', 'HomeController@preferred_language')->name('preferred_language');

Route::get('/welcome/{locale}', 'SiteController@setlocale')->name('setlocale');
// Change Password Routes...
Route::get('/showChangePasswordForm', 'admin\ChangePasswordController@showChangePasswordForm')->name('showChangePasswordForm');
Route::post('/change_password', 'admin\ChangePasswordController@changePassword')->name('change_password');
