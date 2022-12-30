<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'HomeController@admin')->name('admin.index');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    Route::delete('/admin/posts/{post}', 'PostController@destroy')->name('post.destroy');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/admin/posts/{post}', 'PostController@update')->name('post.update');
});
