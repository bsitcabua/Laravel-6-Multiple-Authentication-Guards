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

Route::get('/login', function(){
    return view('pages.user_login');
})->name('login');



