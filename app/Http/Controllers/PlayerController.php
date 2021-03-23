<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\PlayerActivity;

class PlayerController extends Controller
{
    //
    public function detail($firebase_uuid){        
        $player = Player::find($firebase_uuid);        
        return view('player-detail', compact('player'));
        
    }

    public function list(){        
        $players = Player::all();        
        return view('player-list', compact('players'));
    }

    public function activate($firebase_uuid){
        $player = Player::find($firebase_uuid);             
        $player->activated = 1;
        $player->save();           
        return redirect()->route('player.list');
    }

    public function deactivate($firebase_uuid){
        $player = Player::find($firebase_uuid);             
        $player->activated = 0;
        $player->save();           
        return redirect()->route('player.list');
    }
}
