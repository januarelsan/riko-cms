<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activity;
use App\PlayerActivity;
use App\PlayerFinishMission;

class PlayerFinishMissionAPIController extends Controller
{
    public function store(Request $request){        
        
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
    }
}
