<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\PlayerActivity;

class PlayerAPIController extends Controller
{
    public function auth(Request $request){
                
        $player = Player::firstOrNew(['firebase_uuid'=> $request->firebase_uuid]);         
        $player->firebase_uuid = $request->firebase_uuid;
        $player->name = $request->name;
        $player->email = $request->email;
        $player->save();

        // Create Player Activity - Start
        $data = [
            'player_firebase_uuid' => $request->firebase_uuid,            
            'activity_id' => 1,            
        ];

        $playerActivity = PlayerActivity::create($data);        
        //Create Player Activity - End
        
        return $player->firebase_uuid . " Auth Succeed"; 
    }
    
    public function checkActivated($firebase_uuid){        
        $player = Player::find($firebase_uuid);             
        return $player->activated;        
    }

    public function list(){        
        $players = Player::limit(10)->get(['email']);
        return $players;        
    }
}
