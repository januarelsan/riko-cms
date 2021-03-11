<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'activated'])->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => ['auth','activated','superadmin']], function()
{
    Route::get('/list', 'AdminController@list')->name('admin.list');   
    Route::get('/activate/{id}', 'AdminController@activate')->name('admin.activate');    
    Route::get('/revoke/{id}', 'AdminController@revoke')->name('admin.revoke');
});

Route::group(['prefix' => 'player'], function()
{
    Route::post('/auth', 'PlayerController@auth')->name('player.auth');      
    Route::group(['middleware' => ['auth','activated']], function()
    {
        Route::get('/list', 'PlayerController@list')->name('player.list');     
        Route::get('/activate/{id}', 'PlayerController@activate')->name('player.activate');    
        Route::get('/deactivate/{id}', 'PlayerController@deactivate')->name('player.deactivate');              
    });
});




Route::group(['prefix' => 'quiz'], function()
{
    Route::get('/list/four/api', 'QuizController@listAPIFour')->name('quiz.list.four.api');       
    Route::get('/list/two/api', 'QuizController@listAPITwo')->name('quiz.list.two.api');       

    Route::group(['middleware' => ['auth','activated']], function()
    {
        Route::get('/list', 'QuizController@list')->name('quiz.list');       
        Route::get('/form', 'QuizController@form')->name('quiz.form');       
        Route::get('/edit/{id}', 'QuizController@editForm')->name('quiz.edit.form');       
        Route::get('/remove/{id}', 'QuizController@remove')->name('quiz.remove');       
        Route::post('/edit/store', 'QuizController@editStore')->name('quiz.edit.store');       
        Route::post('/store', 'QuizController@store')->name('quiz.store');       
        Route::get('import/form', 'QuizController@importExportView')->name('quiz.import.form');       
        Route::post('import/store', 'QuizController@import')->name('quiz.import.store');
    });
});


Route::get('token/', function() {
    return csrf_token();
});


Route::get('export', 'QuizController@export')->name('export');




