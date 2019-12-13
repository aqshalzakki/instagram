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

Auth::routes();

// Welcome View 

    Route::get('/', function(){ return view('welcome'); });

// -----------

// Profile Routes 

    Route::prefix('profile')->group(function(){

        Route::get('{user}/edit/', 'ProfilesController@edit')
               ->name('profile.edit')
               ->middleware('auth');
                
        Route::get('{user}', 'ProfilesController@show')
               ->name('profile.show');
        
        Route::patch('{user}', 'ProfilesController@update')
               ->name('profile.update')
               ->middleware('auth');

    });

// --------------

// Post Routes 

    
    Route::get('/feeds', 'PostsController@index')->name('post.index');
    Route::prefix('post')->group(function(){

        Route::get('create', 'PostsController@create')->name('post.create')->middleware('auth');
        Route::post('', 'PostsController@store')->name('post.store')->middleware('auth');
        Route::get('{post}', 'PostsController@show')->name('post.show');
    
        Route::delete('{post}', 'PostsController@destroy')->name('post.destroy');
    
    });

// -----------

// Vue in Actions 

    Route::post('/follow/{user}', 'FollowsController@store')->middleware('auth');

// --------------