<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activity;
use App\PlayerActivity;
use App\PlayerFinishMission;
use App\ScoringStatus;

class PlayerFinishMissionAPIController extends Controller
{
    public function store(Request $request){        
        $scoring_status = ScoringStatus::find(1);  

        if($scoring_status->activated == 1){

            // Create Player Activity - Start
            $data = [
                'player_firebase_uuid' => $request->firebase_uuid,            
                'activity_id' => $request->mission_id + 3,            
            ];
    
            $playerActivity = PlayerActivity::create($data);        
            //Create Player Activity - End
    
            //Create Player Finish Mission - Start
            $data = [
                'player_activity_id' => $playerActivity->id,
                'scores' => $request->scores,    
                'play_time' => $request->play_time,    
            ];
            $playerFinishMission = PlayerFinishMission::create($data);        
            //Create Player Finish Mission - End
            return "Player Finish Mission Sent";        
        } else {
            return "Scoring is Inactived";
        }
    }
}
