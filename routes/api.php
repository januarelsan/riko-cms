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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'quiz'], function()
{
    Route::get('/list/four', 'QuizAPIController@listAPIFour')->name('quiz.list.four');       
    Route::get('/list/two', 'QuizAPIController@listAPITwo')->name('quiz.list.two');       
    Route::post('/answer/store', 'QuizAPIController@answer')->name('quiz.answer.store');        
});

Route::group(['prefix' => 'player'], function()
{
    Route::get('/list', 'PlayerAPIController@list')->name('player.list');      
    Route::post('/auth', 'PlayerAPIController@auth')->name('player.auth');      
    Route::get('/checkActivated/{email}', 'PlayerAPIController@checkActivated')->name('player.checkActivated');      
});
