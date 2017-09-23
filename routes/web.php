<?php

/*
|--------------------------------------------------------------------------
| Web
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('web');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/home', 'VadminController@index')->middleware('auth');
Route::get('/vadmin', 'VadminController@index')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

// Route::get('profile', 'UsersController@profile');
// Route::post('profile', 'UsersController@updateAvatar');	


Route::prefix('vadmin')->middleware('auth')->group(function () {
    Route::resource('users', 'UserController');
});

