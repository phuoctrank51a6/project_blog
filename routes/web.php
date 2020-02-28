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
    Route::get('', 'AdminController@index')->name('admin');
    Route::get('register', 'AdminController@register')->name('register');
    Route::post('save-register', 'AdminController@saveRegister')->name('saveRegister');
    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'UserController@listUsers')->name('listUser');
        Route::get('add', 'UserController@addUser')->name('adduser');
        Route::post('save-add', 'UserController@saveAddUser')->name('saveadduser');
        Route::get('delete/{id}', 'UserController@deleteUser');
        Route::get('edit/{id}', 'UserController@editUser');
        Route::post('save-edit/{id}', 'UserController@saveEditUser');
    });
    // category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'categoryController@listCategory')->name('listCategory');
        Route::get('add', 'categoryController@addCategory')->name('addCategory');
        Route::post('save-add', 'categoryController@saveAddCategory')->name('saveAddCategory');
        Route::get('delete/{id}', 'categoryController@deleteCategory');
        Route::get('edit/{id}', 'categoryController@editCategory');
        Route::post('save-edit/{id}', 'categoryController@saveEditCategory');
    });
    // Post
    Route::group(['prefix' => 'post'], function () {
        Route::get('', 'postController@listPost')->name('listPost');
        Route::get('add', 'postController@addPost')->name('addPost');
        Route::post('save-add', 'postController@saveAddPost')->name('saveAddPost');
        Route::get('delete/{id}', 'postController@deletePost');
        Route::get('edit/{id}', 'postController@editPost');
        Route::post('save-edit/{id}', 'postController@saveEditPost');
    });
});
