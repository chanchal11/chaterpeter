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


Route::get('/form1/save','TestController@makeNewCharacter');
Route::get('/form1', function () {
    return view('dev/form1');
});
Route::get('/test1/{word}','TestController@test1');
Route::get('/set','TestController@set_document');
Route::get('/get','TestController@get_all');
Route::post('/testpost','TestController@testpost');

Route::get('/login','LoginController@login');
Route::post('/login/verify','LoginController@checkLoginCredentials');
Route::get('/u/0','FlowController@rootUnlogged'); 

Route::get('/getusername','RegisterController@getUsername');
Route::post('/register-user','RegisterController@registerUser');
Route::get('/register','RegisterController@register');  //----Left to implement

Route::group(['middleware' => 'App\Http\Middleware\CheckSession'], function () {
    Route::get('/logout','LoginController@logout');
    Route::get('/home','FlowController@home');
    Route::get('/', function () {
        return redirect('/home');
    });
    Route::get('/compose','FlowController@giveAnswer');
    Route::get('/review','FlowController@showConfirmation'); 
    Route::get('/showsaved','FlowController@showSavedData'); 
    Route::get('/list','FlowController@showQuestionsList');
    Route::get('/saveanswer','FlowController@saveAnswer'); 
});