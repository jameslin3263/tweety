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

Route::middleware('auth')->group(function() {
    Route::get('tweets', 'TweetsController@index')->name('home');
    Route::post('tweets', 'TweetsController@store');

    Route::post('/profiles/{user}/follow', 'FollowsController@store')->name('follow');
    Route::get('/profiles/{user}/edit', 'ProfilesController@edit');//->middleware('can:edit, user');
    Route::patch('/profiles/{user}', 'ProfilesController@update');//->middleware('can:edit, user');
    Route::get('/explore', 'ExploreController@index');
});


Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
// Route::prefix('tweets')->group(function() {
//     Route::get('/', 'TweetsController@index')->middleware('auth')->name('home');
//     Route::post('/', 'TweetsController@store')->middleware('auth');
// });

Auth::routes();

