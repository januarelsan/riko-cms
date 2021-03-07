<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    //
    public function list(){        
        $players = Player::where('activated',1)->get();        
        return view('player-list', compact('players'));
    }

    public function auth(Request $request){
                
        $player = Player::firstOrNew(['firebase_uuid'=> $request->firebase_uuid]); 
        $player->firebase_uuid = $request->firebase_uuid;
        $player->name = $request->name;
        $player->email = $request->email;
        $player->save();
        
        return $player;
    }
}
