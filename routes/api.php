<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware'=>['api','apiadmin'],'prefix' => 'auth','namespace'=>'Api'],function (){
    //Profiles
    Route::get('profile/{pid}','ProfilesControllers@find');


    //Post
    Route::get('posts','Postcontrollers@all');
    Route::get('{pid}/posts','Postcontrollers@pall');
    Route::get('{pid}/posts/{id}','Postcontrollers@find');
    Route::post('posts/create','Postcontrollers@create');
    //comments
    Route::get('posts/{id}/comments','CommentControllers@all');
    Route::get('posts/{id}/comments/{cid}','CommentControllers@find');
    Route::post('posts/{id}/comments/create','CommentControllers@create');
    //Connection
    Route::get('{pid}/connection','ConnectionControllers@all');
    Route::get('{pid}/connection/sent','ConnectionControllers@sent');
    Route::get('{pid}/connection/received','ConnectionControllers@received');
    Route::post('connection/add','ConnectionControllers@add');
    Route::post('connection/{cid}/status','ConnectionControllers@status');
    //Rating
    Route::get('{pid}/rate','StarControllers@all');
    Route::get('{pid}/rate/sent','StarControllers@sent');
    Route::get('{pid}/rate/received','StarControllers@received');
    Route::post('rate/add','StarControllers@add');


});



Route::group(['middleware' => ['api','apiadmin'], 'prefix' => 'auth','namespace'=>'Api'], function ($router) {
    Route::post('login', 'UserControllers@login');
    Route::post('register', 'UserControllers@register');
    Route::post('logout', 'UserControllers@logout');
    Route::post('refresh', 'UserControllers@refresh');
    Route::get('profile', 'UserControllers@userProfile');
});
