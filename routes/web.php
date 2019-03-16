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

Route::get('/', 'PostsController@index')->name('top');
Route::get('posts/show/{id}', 'PostsController@show')
    ->name('posts.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@index')
        ->name('profile');
    Route::post('profile', 'ProfileController@store');

    Route::get('posts/create', 'PostsController@showCreateForm')
        ->name('posts.create');
    Route::post('posts/create', 'PostsController@create');
    
    Route::get('posts/show/{id}/comments/create', 'CommentsController@showCreateForm')
        ->name('comments.create');
    Route::post('posts/show/{id}/comments/create', 'CommentsController@create');

    Route::get('posts/show/{id}/edit', 'PostsController@showEditForm')
        ->name('posts.edit');
    Route::post('posts/show/{id}/edit', 'PostsController@edit');

    Route::post('posts/show/{id}/delete', 'PostsController@delete')
        ->name('posts.delete');
});

