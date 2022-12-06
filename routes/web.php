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
Route::get('/', 'BnsiteContentController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/setlocale/{locale}', 'BnsiteContentController@setlocale')->name('setlocale');


//Route::group(['middleware' => ['auth']], function () {
//   
//});


// ChangePasswordController Routes...
Route::get('/showChangePasswordForm', 'ChangePasswordController@showChangePasswordForm')->name('showChangePasswordForm');
Route::post('/change_password', 'ChangePasswordController@changePassword')->name('change_password');
// UserController Routes...
Route::get('/index', 'UserController@index')->name('users.index');
Route::get('/create', 'UserController@create')->name('users.create');
Route::post('/store2', 'UserController@store')->name('users.store2');
Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
Route::patch('/update/{id}', 'UserController@update')->name('users.update');
Route::delete('/destroy/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('/preferred_language/{lang}', 'UserController@preferred_language')->name('preferred_language');
Route::patch('/update_name/{id}', 'UserController@update_name')->name('users.update_name');
Route::patch('/update_preferred_language/{id}', 'UserController@update_preferred_language')->name('users.update_preferred_language');
Route::patch('/update_role/{id}', 'UserController@update_role')->name('users.update_role');
Route::get('/show/{id}', 'UserController@show')->name('users.show');
Route::get('/site_management', 'UserController@site_management')->name('site_management');
// RoleController Routes...
Route::resource('roles', RoleController::class);
// BnsiteContents Routes...
//Route::resource('BnsiteContents', BnsiteContentController::class);
Route::post('/store', 'BnsitecontentController@store')->name('bnsitecontents.store');
Route::post('/update', 'BnsitecontentController@update')->name('bnsitecontents.update');
