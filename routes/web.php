<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::prefix("/admin")->group(function(){
    Route::get("/",[
        'as' => 'admin.index',
        'uses' => 'adminController\homeController@index'
    ]);
    Route::prefix("/classes")->group(function(){
        Route::get("/",[
            'as' => 'class.index',
            'uses' => 'adminController\classesController@index'
        ]);
        Route::get('/create',[
            'as'=>'class.create',
            'uses'=>'adminController\classesController@create'
        ]);
        Route::post('/store',[
            'as'=>'class.store',
            'uses'=>'adminController\classesController@store'
        ]);
        Route::get('/edit_view/{id}',[
            'as'=>'class.edit_view',
            'uses'=>'adminController\classesController@edit_view'
        ]);
        
    });
    Route::prefix("/role")->group(function(){
        Route::get("/",[
            'as' => 'role.index',
            'uses' => 'adminController\roleController@index'
        ]);
        Route::get('/create',[
            'as'=>'role.create',
            'uses'=>'adminController\roleController@create'
        ]);
        Route::post('/store',[
            'as'=>'role.store',
            'uses'=>'adminController\roleController@store'
        ]);
        Route::get('/assign_role',[
            'as' => 'role.assign',
            'uses' => 'adminController\roleController@assign_role'
        ]);
        Route::post('/assign_role_update',[
            'as' => 'role.assign.update',
            'uses' => 'adminController\roleController@assign_role_update'
        ]);
    });
    
});
Route::prefix('/')->group(function(){
    Route::get('/',[
        'as' => 'home.index',
        'uses' => 'userController\homeController@index'
    ]);
    Route::get('/my_class',[
        'as' => 'home.my_class',
        'uses' => 'userController\homeController@my_class'
    ]);
    Route::get('/single_class/{id}',[
        'as' => 'home.single_class',
        'uses' => 'userController\homeController@single_class'
    ]);
    Route::prefix('/request')->group(function(){

        Route::get('/index',[
            'as' => 'request.index',
            'uses' => 'userController\requestController@index'
        ]);
        Route::post('/store',[
            'as' => 'request.store',
            'uses' => 'userController\requestController@store'
        ]);
        Route::post('/accept',[
            'as' => 'request.accept',
            'uses' => 'userController\requestController@accept'
        ]);
        
    });
});
Route::prefix('/login')->group(function(){
    Route::get('/',[
        'as' => 'login.form',
        'uses' => 'loginController\loginController@form_login'
    ]);
    Route::post('/check',[
        'as' => 'login.check',
        'uses' => 'loginController\loginController@login_check'
    ]);
    Route::get('/register',[
        'as' => 'register.form',
        'uses' => 'loginController\loginController@form_register'
    ]);
    Route::get('/register_store',[
        'as' => 'register.store',
        'uses' => 'loginController\loginController@register_store'
    ]);
    Route::get('/logout',[
        'as' => 'logout',
        'uses' => 'loginController\loginController@logout'
    ]);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

