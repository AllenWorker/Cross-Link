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
    return view('pages.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController')->middleware(['auth', 'role:Admin|User']);
Route::resource('bookmark', 'BookmarkController')->middleware(['auth', 'role:Admin|User']);
Route::resource('social', 'SocialLinkController')->middleware(['auth', 'role:Admin|User']);
