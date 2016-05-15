<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'admin'], function(){

Route::resource('admin/users', 'AdminUsersController');

Route::resource('admin/posts', 'AdminPostsController');

Route::resource('admin/categories', 'AdminCategoriesController');

});