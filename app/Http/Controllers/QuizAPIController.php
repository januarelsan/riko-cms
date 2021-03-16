<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Option;
use App\Activity;
use App\PlayerActivity;
use App\PlayerQuizAnswer;

class QuizAPIController extends Controller
{
    //
    public function answer(Request $request){        
        
        //Create Player Activity - Start
        $data = [
            'player_uuid' => $request->player_uuid,            
            'activity_id' => 1,            
        ];

        $playerActivity = PlayerActivity::create($data);        
        //Create Player Activity - End

        //Create Player Quiz Answer - Start
        $data = [
            'player_activity_id' => $playerActivity->id,
            'option_id' => $request->option_id,    
        ];
        $playerQuizAnswer = PlayerQuizAnswer::create($data);        
        //Create Player Quiz Answer - End
        return "Player Quiz Answer Sent";        
    }

    public function listAPIFour(){        
    
        $quizzes = Quiz::has('options', '>=', 4)->where('removed', '=', 0)->inRandomOrder()->limit(5)->with('options')->get(['id','question']);                                
        return $quizzes;
    }

    public function listAPITwo(){            
        $quizzes = Quiz::has('options', '=', 2)->where('removed', '=', 0)->inRandomOrder()->limit(5)->with('options')->get(['id','question']);                                
        return $quizzes;
    }
}
