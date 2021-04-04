<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\ScoringStatus;


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
    $scoring_status = ScoringStatus::find(1);    
    return view('index',compact('scoring_status'));

})->middleware(['auth', 'activated'])->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => ['auth','activated']], function()
{
    Route::get('/edit/{id}', 'AdminController@editForm')->name('admin.edit.form');   
    Route::post('/edit/store', 'AdminController@editStore')->name('admin.edit.store');           
  
    Route::group(['middleware' => ['auth','activated','superadmin']], function()
    {
        Route::get('/list', 'AdminController@list')->name('admin.list');   
        Route::get('/activate/{id}', 'AdminController@activate')->name('admin.activate');    
        Route::get('/revoke/{id}', 'AdminController@revoke')->name('admin.revoke');
    });
});



Route::group(['prefix' => 'player' , 'middleware' => ['auth','activated']], function()
{
    Route::post('/dau/list', 'PlayerController@dauList')->name('player.dau.list');    
    Route::get('/default/dau/list', 'PlayerController@defaultDauList')->name('player.default.dau.list');    

    Route::get('/activate/scoring', 'PlayerController@activateScoringStatus')->name('scoring.activate');    
    Route::get('/deactivate/scoring', 'PlayerController@deactivateScoringStatus')->name('scoring.deactivate');    
    Route::get('/list', 'PlayerController@list')->name('player.list');     
    Route::get('/leaderboard', 'PlayerController@leaderboard')->name('player.leaderboard');     
    Route::get('/detail/{firebase_uuid}', 'PlayerController@detail')->name('player.detail');    
    Route::get('/activate/{firebase_uuid}', 'PlayerController@activate')->name('player.activate');    
    Route::get('/deactivate/{firebase_uuid}', 'PlayerController@deactivate')->name('player.deactivate');              

    Route::get('/finishMission/show/{player_activity_id}', 'PlayerFinishMissionController@show')->name('player.finishMission.show');              
    Route::get('/finishMission/leaderboard/', 'PlayerFinishMissionController@leaderboard')->name('player.finishMission.leaderboard');              
    Route::get('/finishMission/list/{activity_id}', 'PlayerFinishMissionController@finishedPlayerList')->name('player.finishMission.list');              

    Route::get('mission/list', function () {
        return view('mission-list');
    })->name('mission.list');     

    Route::get('/mission/{activity_id}', 'PlayerFinishMissionController@finishedPlayerList')->name('player.finishMission.list');              

    
});


Route::group(['prefix' => 'quiz' , 'middleware' => ['auth','activated']],  function()
{    
    Route::get('/leaderboard', 'QuizController@leaderboard')->name('quiz.leaderboard');     
    Route::get('/list', 'QuizController@list')->name('quiz.list');       
    Route::get('/form', 'QuizController@form')->name('quiz.form');       
    Route::get('/edit/{id}', 'QuizController@editForm')->name('quiz.edit.form');       
    Route::get('/detail/{id}', 'QuizController@detail')->name('quiz.detail');       
    Route::get('/remove/{id}', 'QuizController@remove')->name('quiz.remove');       
    Route::get('/activate/{id}', 'QuizController@activate')->name('quiz.activate');       
    Route::post('/edit/store', 'QuizController@editStore')->name('quiz.edit.store');       
    Route::post('/store', 'QuizController@store')->name('quiz.store');       
    Route::get('/import/form', 'QuizController@importExportView')->name('quiz.import.form');       
    Route::post('/import/store/two', 'QuizController@importTwoOption')->name('quiz.import.two.store');
    Route::post('/import/store/four', 'QuizController@importFourOption')->name('quiz.import.four.store');
    Route::get('/download/two', 'QuizController@downloadTwoTemplate')->name('quiz.download.two');
    Route::get('/download/four', 'QuizController@downloadFourTemplate')->name('quiz.download.four');
    

    Route::get('/export', 'QuizController@export')->name('quiz.export');

});

Route::group(['prefix' => 'playerQuizAnswer' ],  function()
{    
    Route::get('/show/{player_activity_id}', 'PlayerQuizAnswerController@show')->name('playerQuizAnswer.show');       
    
});


Route::get('token/', function() {
    return csrf_token();
});


Route::get('export', 'QuizController@export')->name('export');




