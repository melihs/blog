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

Route::group(['prefix'=>'yonetim','middleware' =>'admin'],function (){
    Route::get('/','UserController@adminIndex')->name('admin.index');
    Route::resource('kullanicilar','UserController');
    Route::get('/cikis','UserController@userLogout')->name('user.userLogout');
    Route::resource('ayarlar','SettingController');
    Route::resource('kategoriler','CategoryController');
    Route::resource('yazilar','PostController');
    Route::resource('sayfalar' , 'PageController');
    Route::resource('yorumlar' , 'CommentController');
    Route::get('onayla/{id}','CommentController@confirm')->name('yorumlar.confirm');
    Route::get('onaylama/{id}','CommentController@dontConfirm')->name('yorumlar.dontConfirm');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('homepage');
Route::get('yazi/{id}/{slug}', 'HomeController@post')->name('post.show');
Route::get('kategori/{id}/{slug}','HomeController@category')->name('category.show');
Route::get('sayfa/{id}/{slug}','HomeController@page')->name('page.show');
Route::post('gonder', 'HomeController@sendComment')->name('comment.send');
Route::any('arama', 'HomeController@search')->name('search');
Route::any('aboneol', 'HomeController@subscribe')->name('subscribe');
//Route::get('password/reset','UserController@password');
//Route::post('password/reset','UserController@sendMail')->name('send.mail');

