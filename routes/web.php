<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'HomeController@admin')->name('admin.index');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
});
