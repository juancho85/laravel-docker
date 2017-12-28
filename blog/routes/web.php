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

Route::get('/', [
    'uses' => 'PostController@getBlogIndex',
    'as' => 'blog.index'
]);

Route::get('/blog', [
    'uses' => 'PostController@getBlogIndex',
    'as' => 'blog.index'
]);

Route::get('/blog/{post_id}', [
    'uses' => 'PostController@getsinglePost',
    'as' => 'blog.single'
]);

//Other routes
Route::get('/about', function() {
    return view('frontend.other.about');
})->name('about');

Route::get('/contact', [
    'uses' => 'ContactMessageController@getContactIndex',
    'as' => 'contact'
]);

Route::group([
    'prefix' => '/admin'
    ], function() {

    Route::get('/', [
        'uses' => 'AdminController@getIndex',
        'as' => 'admin.index'
    ]);

    Route::get('/blog/posts', [
        'uses' => 'PostController@getPostsIndex',
        'as' => 'admin.blog.index'
    ]);

    Route::get('/blog/posts/create', [
        'uses' => 'PostController@getCreatePost',
        'as' => 'admin.blog.create_post'
    ]);

    Route::post('/blog/post/create', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'admin.blog.post.create'
    ]);




});
