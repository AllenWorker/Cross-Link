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
use App\Bookmark;
Route::get('/', function () {
    $bookmarks = Bookmark::Where('public', '=', 1)->take(5)->get();
    return view('pages.index', compact('bookmarks'));
});


Auth::routes();

Route::get('/users/{id}' , 'UserController@show')->middleware(['auth', 'role:Admin|User|UserAdmin']);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController')->middleware(['auth', 'role:Admin|User|UserAdmin']);
Route::resource('bookmark', 'BookmarkController')->middleware(['auth', 'role:Admin|User|UserAdmin']);
Route::post('bookmark/search', 'BookmarkController@search')->middleware(['auth', 'role:Admin|User|UserAdmin']);
Route::resource('social', 'SocialLinkController')->middleware(['auth', 'role:Admin|User|UserAdmin']);
Route::resource('user', 'UserController')->middleware(['auth', 'role:Admin|UserAdmin']);;
Route::post('user/search', 'UserController@search');
Route::resource('tag', 'TagController')->middleware(['auth', 'role:Admin']);
