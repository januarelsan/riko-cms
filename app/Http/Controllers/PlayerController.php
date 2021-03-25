<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\PlayerActivity;
use App\PlayerFinishMission;

class PlayerController extends Controller
{
    //
    public function detail($firebase_uuid){        
        $player = Player::find($firebase_uuid);      
        
        $totalScore = 0;

        $playerActivities = PlayerActivity::where('player_firebase_uuid', '=' , $firebase_uuid)->get();

        for ($i=0; $i < count($playerActivities); $i++) { 
            if($playerActivities[$i]->activity->id >= 3 && $playerActivities[$i]->activity->id <= 27){
                $totalScore += $playerActivities[$i]->player_finish_mission->scores;
            }
        }

        return view('player-detail', compact('player', 'totalScore'));
        
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
