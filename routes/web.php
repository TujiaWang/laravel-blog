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



Route::group(['middleware'=>['web']],function(){
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::any('admin/login', 'Admin\LoginController@login');
	Route::get('admin/code','Admin\LoginController@code');
	
});

Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){  
    Route::get('index','IndexController@index');
    Route::get('top','IndexController@top');
    Route::get('left','IndexController@left');
    Route::get('right','IndexController@right');
    
    Route::get('logout','LoginController@logout');
    Route::any('pass','IndexController@pass');
    
    Route::resource('category','CategoryController');
    
    Route::post('cat/changeorder','CategoryController@changeOrder');
    
    
    Route::resource('article','ArticleController');
    
    Route::any('upload','CommonController@upload');
    
    Route::resource('links','LinksController');
    
    Route::post('lks/changeorder','LinksController@changeOrder');
});
