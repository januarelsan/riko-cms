<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    //
    public function detail($id){        
        

        $player = Player::find($id);        
        return view('player-detail', compact('player'));
    }

    public function list(){        
        $players = Player::all();        
        return view('player-list', compact('players'));
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
