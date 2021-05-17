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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




 Route::group(['middleware'=>'admin'],function(){

    Route::get('/admin',function(){

        return view('layouts.adminlayout');
    });

    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    Route::get('/users','AdminUserController@index')->name('users');

    Route::get('/create-user','AdminUserController@create')->name('create-user');

    Route::post('/store-user','AdminUserController@store')->name('store-user');

    Route::get('/edit-user/{id}','AdminUserController@edit')->name('edit-user');

    Route::post('/update-user/{id}','AdminUserController@update')->name('update-user');

    Route::get('/delete-user/{id}','AdminUserController@destroy')->name('delete-user');

 });


