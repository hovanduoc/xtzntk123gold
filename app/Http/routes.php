<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use App\TokenModel;
Route::get('/', function () {
    return view('fontend.layout');
});
Route::get('/dashboard', function () {
    #return redirect('dashboard/result');
    return redirect('dashboard/listuser');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|   
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'dashboard','middleware' => 'checklogin'], function(){
        Route::controllers(['result'        => 'Admin\ResultController']);
        Route::controllers(['listuser'        => 'Admin\UserController']);
    });
    Route::get('/login',['as'=>'getLogin','uses'=>'Admin\UserController@getLogin']);
    Route::post('/login',['as'=>'postLogin','uses'=>'Admin\UserController@postLogin']);
    Route::get('/logout', ['as'=>'getLogout','uses'=>'Admin\UserController@getLogout']);
    // //Route::controllers(['home'        => 'Admin\HomeController']);
    // Route::get('/home',['as'=>'getRegister','uses'=>'Admin\HomeController@getRegister']);
    // Route::post('/home',['as'=>'postRegister','uses'=>'Admin\HomeController@postRegister']);
});


