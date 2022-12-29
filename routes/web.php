<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@show')->name('post');
Route::get('/admin', 'HomeController@admin')->name('admin.index');
