<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\PlayerFinishMission;
use App\PlayerActivity;
use App\Player;
use App\Activity;

class PlayerFinishMissionController extends Controller
{
    public function show($player_activity_id){        
        
        $playerFinishMission = PlayerFinishMission::where('player_activity_id', '=' , $player_activity_id)->first();
        // return $playerFinishMission;
        return view('playerFinishMission-detail', compact('playerFinishMission'));
        
    }

    public function finishedPlayerList($activity_id){        
        
        $players = Player::whereHas('player_activities.activity', function (Builder $query) use($activity_id) {
            $query->where('id', '=', $activity_id);
        })->get();

        $activity = Activity::find($activity_id);

        
        // return $players;
        return view('playerFinishMission-list', compact('players','activity'));
        
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
