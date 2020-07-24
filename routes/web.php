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

Route::get('musicians', 'MusicianController@index')->name('musicians.index');
// todo : user->musicianを表示するように変更
Route::get('musicians/{musician}', 'MusicianController@show')->name('musicians.show');

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');

Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\Auth\LoginController@login')->name('post.admin.login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

Route::get('admin/index', 'Admin\HomeController@index')->name('admin.index');