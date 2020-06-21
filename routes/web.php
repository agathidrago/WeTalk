<?php

use Illuminate\Support\Facades\Route;
use \App\Post;
use \App\Mail\NewUserWelcomeMail;
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

Route::get('/email',function(){
    return new NewUserWelcomeMail();
});

Route::get('/','PostsController@index');
Route::get('/p/create','PostsController@create');
Route::post('/p','PostsController@store');
Route::get('/p/{post}','PostsController@show');

Route::get('/delete-post/{id}','PostsController@deletePosts');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}/', 'ProfilesController@update')->name('profile.update');

Route::post('follow/{user}', 'FollowsController@store');
Route::post('like/{post}', 'LikesController@store');

Route::get( '/search','SearchController@search');
