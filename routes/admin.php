<?php

Route::group(['middleware' => ['guest:admin']], function () {
    Route::get('/login', 'AuthController@viewLogin')->name('admin.login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
});


Route::post('admin-logout', 'AuthController@adminLogout')->name('admin.logout');

Route::resource('clients', 'ClientController');
Route::get('client/toggle-boolean/{id}/{action}', 'ClientController@toggleBoolean')->name('client.toggleBoolean');
Route::resource('categories', 'CategoryController');
Route::resource('skills', 'SkillsController');


?>

