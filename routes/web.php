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


//Route::group(['middleware' => ['auth']], function () {
//   
//});


// ChangePasswordController Routes...
Route::get('/showChangePasswordForm', 'ChangePasswordController@showChangePasswordForm')->name('showChangePasswordForm');
Route::post('/change_password', 'ChangePasswordController@changePassword')->name('change_password');
// UserController Routes...
Route::get('/index', 'UserController@index')->name('users.index');
Route::get('/create', 'UserController@create')->name('users.create');
Route::post('/create', 'UserController@store')->name('users.store');
Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/edit/{id}', 'UserController@update')->name('users.update');
Route::get('/user/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('/home/{lang}', 'UserController@preferred_language')->name('preferred_language');

Route::resource('roles', RoleController::class);