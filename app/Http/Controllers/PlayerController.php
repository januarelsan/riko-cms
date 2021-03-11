<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    //
    public function list(){        
        $players = Player::all();        
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

    public function activate($id){
        $player = Player::find($id);             
        $player->activated = 1;
        $player->save();           
        return redirect()->route('player.list');
    }

    public function deactivate($id){
        $player = Player::find($id);             
        $player->activated = 0;
        $player->save();           
        return redirect()->route('player.list');
    }
}
