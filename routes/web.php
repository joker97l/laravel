<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now  create something great!
|
*/
Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');
Route::resource('/bid','BidController');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');
  Route::resource('/category','CategoryController', ['as'=>'admin']);
  Route::resource('/article','ArticleController', ['as'=>'admin']);
  Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function(){
    Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
  });
});

Route::get('/', function () {
    return view('blog.home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/get-json', 'HomeController@getJson');
Route::get('/home/data-chart', 'HomeController@chartData');
Route::get('/home/random-chart', 'HomeController@chartRandom');
