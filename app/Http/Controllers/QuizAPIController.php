<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Option;
use App\Activity;
use App\PlayerActivity;
use App\PlayerQuizAnswer;
use App\ScoringStatus;

class QuizAPIController extends Controller
{
    //
    public function answer(Request $request){        
        
        $scoring_status = ScoringStatus::find(1);  

        if($scoring_status->activated == 1){

            // Create Player Activity - Start
            $data = [
                'player_firebase_uuid' => $request->firebase_uuid,            
                'activity_id' => 2,            
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
        } else {
            return "Scoring is Inactived";
        }
    }

    public function listAPIFour(){        
    
        $quizzes = Quiz::has('options', '>=', 4)->where('removed', '=', 0)->inRandomOrder()->limit(5)->with('options')->get(['id','question']);                                
        return $quizzes;
    }

    public function listAPITwo(){            
        $quizzes = Quiz::has('options', '=', 2)->where('removed', '=', 0)->inRandomOrder()->limit(30)->with('options')->get(['id','question']);                                
        return $quizzes;
    }
}
