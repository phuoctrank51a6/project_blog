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
Route::get('404', function () {
    return view('backend.error404');
});
// ADMIN
Route::group(['prefix' => 'admin/'], function () {
        
    Route::get('register', 'AdminController@register')->name('register');
    Route::post('save-register', 'AdminController@saveRegister')->name('saveRegister');
    Route::get('login', 'AuthController@login')->name('login')->middleware('checkLogout');
    Route::post('post-login', 'AuthController@postLogin')->name('postLogin');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::group(['middleware' => ['checkAuth', 'CheckStatus', 'checkRole']], function () {
        Route::get('', 'AdminController@index')->name('admin');
        // User
        Route::resource('user', 'UserController');
        // category
        Route::resource('category', 'categoryController');
        // Post
        Route::resource('post', 'postController');
        // Comment
        Route::resource('comment', 'commentController');
    });
    
});
Route::get('send-email', 'EmailController@sendEMail');
// USER
Route::get('/', 'homeController@index')->name('blog');
Route::get('detail/{id}', 'homeController@show');
Route::get('comment', 'homeController@comment');
Route::get('my-blog/{id}', 'homeController@myBlog');
Route::get('add-blog', 'homecontroller@addBlog')->middleware('checkAuth');
Route::delete('destroy-blog/{id}', 'homecontroller@destroyBlog')->name("destroyBlog");

