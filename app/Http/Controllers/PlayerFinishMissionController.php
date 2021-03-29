<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayerFinishMission;
use App\PlayerActivity;
use App\Player;

class PlayerFinishMissionController extends Controller
{
    public function show($player_activity_id){        
        
        $playerFinishMission = PlayerFinishMission::where('player_activity_id', '=' , $player_activity_id)->first();
        // return $playerFinishMission;
        return view('playerFinishMission-detail', compact('playerFinishMission'));
        
    }

    public function leaderboard(){        
        $players = Player::all();
                
        $players = $players->sortByDesc(function ($player) {
            return $player->player_activities->max('player_finish_mission.player_activity.activity.id');
        });

        // return $players;
        
        return view('mission-leaderboard', compact('players'));
        
    }
}
