<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerAPIController extends Controller
{
    public function auth(Request $request){
                
        $player = Player::firstOrNew(['email'=> $request->email]); 
        $player->firebase_uuid = $request->firebase_uuid;
        $player->name = $request->name;
        $player->email = $request->email;
        $player->save();
        
        return $player->email . " Auth Succeed"; 
    }
    
    public function checkActivated($email){        
        $player = Player::where('email',$email)->first();             
        return $player->activated;        
    }

    public function list(){        
        $players = Player::limit(10)->get(['email']);
        return $players;        
    }
}
