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

// Profile Routes
    Route::get('/profile/{user}/edit/', 'ProfilesController@edit')->name('profile.edit')->middleware('auth');; 
    Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
    Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
// ----------

// Post Routes 
    Route::get('/post/create', 'PostsController@create')->name('post.create')->middleware('auth');
    Route::post('/post', 'PostsController@store')->name('post.store')->middleware('auth');
    Route::get('/post/{post}', 'PostsController@show')->name('post.show');

    Route::delete('/post/{post}', 'PostsController@destroy')->name('post.destroy');
// -----------

// Vue in Actions 

    Route::post('/follow/{user}', 'FollowsController@store')->middleware('auth');

// --------------