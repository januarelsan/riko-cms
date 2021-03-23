<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayerQuizAnswer;
use App\PlayerActivity;
use App\Player;

class PlayerQuizAnswerController extends Controller
{
    public function list(){        
        $playerQuizAnswers = PlayerQuizAnswer::all();
        return $playerQuizAnswers;        
    }

    public function show($player_activity_id){        
        
        $playerQuizAnswer = PlayerQuizAnswer::where('player_activity_id', '=' , $player_activity_id)->first();
        // return $playerQuizAnswer;
        return view('playerQuizAnswer-detail', compact('playerQuizAnswer'));
        
    }
    
}
