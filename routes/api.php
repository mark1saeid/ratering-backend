<?php

use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware'=>['api','apiadmin'],'prefix' => 'auth','namespace'=>'Api'],function (){
    //Profiles
    Route::get('profile/{pid}','ProfilesControllers@find');
    Route::post('profile/pp','ProfilesControllers@uploadpp');
    Route::post('profile/bio','ProfilesControllers@updatebio');

    //Post
    Route::get('posts','Postcontrollers@all');
    Route::get('posts/trend','Postcontrollers@trend');
    Route::get('posts/videos','Postcontrollers@videos');
    Route::get('{pid}/posts','Postcontrollers@pall');
    Route::get('{pid}/posts/{id}','Postcontrollers@find');
    Route::post('posts/create','Postcontrollers@create');
    Route::post('posts/{pid}/delete','Postcontrollers@remove');

    //report
    Route::post('report/create','ReportControllers@create');


    //Status
    Route::get('status','StatusControllers@all');
    Route::get('{pid}/status','StatusControllers@pall');
    Route::post('{sid}/status/rate','StatusControllers@rate');
    Route::get('{pid}/status/{id}','StatusControllers@find');
    Route::post('status/create','StatusControllers@create');
    Route::post('status/{sid}/delete','StatusControllers@remove');

    //comments
    Route::get('posts/{id}/comments','CommentControllers@all');
    Route::get('posts/{id}/comments/{cid}','CommentControllers@find');
    Route::post('posts/{pid}/comments/create','CommentControllers@create');
    Route::post('posts/{pid}/comments/{cid}/delete','CommentControllers@remove');


    //Connection
    Route::get('connection','ConnectionControllers@all');
    Route::get('connection/sent','ConnectionControllers@sent');
    Route::get('connection/received','ConnectionControllers@received');
    Route::post('connection/add','ConnectionControllers@add');
    Route::post('connection/{cid}/status','ConnectionControllers@status');
    Route::post('connection/{cid}/remove','ConnectionControllers@remove');

    //Rating
    Route::get('{pid}/rate','StarControllers@all');
    Route::get('{pid}/rate/sent','StarControllers@sent');
    Route::get('{pid}/rate/received','StarControllers@received');
    Route::post('rate/add','StarControllers@add');



    //Interaction

    Route::post('{pid}/views/add','InteractionControllers@add_views');
    Route::get('{pid}/views','InteractionControllers@get_views');
    Route::get('{pid}/impression','InteractionControllers@get_impression');
    Route::post('{pid}/notinterested','InteractionControllers@not_interested');

    //Transaction

    Route::get('{id}/tip/all','TransactionControllers@all');
    Route::get('{id}/sent','TransactionControllers@sent');
    Route::get('{id}/received','TransactionControllers@received');
    Route::get('{pid}/posts/tip','TransactionControllers@post');
    Route::post('{pid}/posts/tip/send','TransactionControllers@Send');

});





Route::group(['middleware' => ['api','apiadmin'], 'prefix' => 'auth','namespace'=>'Api'], function ($router) {
    Route::post('login', 'UserControllers@login')->name('api/login');
    Route::post('register', 'UserControllers@register');
    Route::post('logout', 'UserControllers@logout');
    Route::post('refresh', 'UserControllers@refresh');

    Route::post('remove', 'UserControllers@remove');

    Route::get('profile', 'UserControllers@userProfile');


});
URL::forceScheme('https');
