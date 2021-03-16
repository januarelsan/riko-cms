<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerAPIController extends Controller
{
    public function auth(Request $request){
                
        $player = Player::firstOrNew(['firebase_uuid'=> $request->firebase_uuid]); 
        $player->firebase_uuid = $request->firebase_uuid;
        $player->name = $request->name;
        $player->email = $request->email;
        $player->save();
        
        return $player;
    }
    
    public function checkActivated($uuid){        
        $player = Player::where('firebase_uuid',$uuid)->first();             
        return $player->activated;        
    }
}
