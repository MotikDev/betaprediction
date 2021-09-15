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

Route::get('/', 'PagesController@index');

Route::get('/rollover', 'PagesController@rollover');

Route::get('/1x2', 'PagesController@_1x2');

Route::get('/btts', 'PagesController@btts');

Route::get('/contactus', 'PagesController@contactus');

Route::get('/over', 'PagesController@over');

Route::resource('post', 'PostsController');

Auth::routes();

Route::get('/home', 'PagesController@userComments')->name('home');

Route::post('/comment', 'PagesController@storeComment')->name('comment');

Route::get('/comments', 'PagesController@commentIndex')->name('comments');

Route::post('/reply', 'PagesController@storeReply')->name('reply');