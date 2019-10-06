<?php

Route::group(['prefix' => 'admin'], function () {
    
    // Protected routes
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'AdminDashboardController@index');
        Route::get('/dashboard', 'AdminDashboardController@index');
        Route::get('/logout','AdminUserController@logout')->name('admin.logout');

    });

    Route::get('/login', 'AdminUserController@index');
    Route::post('/login', 'AdminUserController@store')->name('admin.login');
});

// User

Route::get('/', function(){
    return redirect('/dashboard');
});

Route::get('/login', 'SessionController@index')->name('login');
Route::post('/login', 'SessionController@store')->name('login.store');
Route::get('/signup', 'RegistrationController@index');
Route::post('/signup', 'RegistrationController@store')->name('signup.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout','SessionController@logout')->name('logout');
    Route::get('/dashboard', 'Dashboard@index');
});




