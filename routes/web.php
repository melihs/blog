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
Route::get('/', 'HomeController@index')->name('homepage');

Route::group(['prefix'=>'yonetim','middleware' =>'admin'],function (){
    Route::get('/','UserController@adminIndex')->name('admin.index');
    Route::resource('kullanicilar','UserController');
    Route::get('/cikis','UserController@userLogout')->name('user.userLogout');
    Route::resource('ayarlar','SettingController');
    Route::resource('kategoriler','CategoryController');
    Route::resource('yazilar','PostController');
    Route::resource('sayfalar' , 'PageController');
    Route::get('sayfa/{id}/{slug}','PageController@show')->name('page.show');
    Route::resource('yorumlar' , 'CommentController');
    Route::get('onayla/{id}','CommentController@confirm')->name('yorumlar.confirm');
    Route::get('onaylama/{id}','CommentController@dontConfirm')->name('yorumlar.dontConfirm');
});


