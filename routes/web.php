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

Route::get('/', function () {
    return redirect()->route('cms.dashboard');
});

/*Route::get('/cms', array('uses' => 'backend\Dashboard@index'))->name('cms.dashboard');
Route::get('/cms/login', array('uses' => 'backend\Login@index'))->name('cms.login');
Route::post('/cms/login', array('uses' => 'backend\Login@doLogin'))->name('cms.login.do');*/

//Route::post('/cms/logout', array('uses' => 'backend\Logout@index'))->name('cms.logout');

Route::group(['as'=>'cms.'  ,'prefix'=>'cms'],function(){
    Route::get('/login', 'backend\Login@index')->name('login');
    Route::post('/login', 'backend\Login@doLogin')->name('login.do');
    Route::any('/logout', 'backend\Logout@index')->name('logout');
    Route::get('/', 'backend\Dashboard@index')->name('dashboard');
    Route::resource('/user-management', 'backend\Users');
    //Route::get('/priviledge-management', 'backend\Priviledges@index')->name('cms.priviledge.list');
});
