<?php

use Illuminate\Support\Facades\Route;

//user routes
Route::get('/', 'UserController@index')->name('user.index');
Route::get('/user/active/at', 'UserController@indexActiveAt')->name('user.active');
Route::get('/user/edit/{user}', 'UserController@edit')->name('user.edit');
Route::post('/user/update/{user}', 'UserController@update')->name('user.update');
Route::get('/user/delete/{user}', 'UserController@destroy')->name('user.destroy');

//Route::resource('user', UserController::class); not using resource route as we don't need all routes in this case

//transaction route
Route::get('/transactions', 'TransactionsController@index')->name('transactions.index');