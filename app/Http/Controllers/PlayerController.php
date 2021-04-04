<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Player;
use App\PlayerActivity;
use App\PlayerFinishMission;
use App\ScoringStatus;

class PlayerController extends Controller
{
    //public function dauList(Request $request, $from = '2021-04-07', $to = '2021-04-08'){        
    public function dauList(Request $request){        
        
        $from = $request->from;
        $to = $request->to;

        if($from == $to){
            $players = Player::whereHas('player_activities', function (Builder $query) use($from){
                $query->whereDate('created_at', '=' , $from);
            })->get();
        }else{
            $players = Player::whereHas('player_activities', function (Builder $query) use($from, $to){
                $query->whereBetween('created_at', [$from, $to]);
            })->get();
        }
            
        
        return view('player-dau-list', compact('players','from','to'));
    }

    public function defaultDauList(){        
                
        $from = '2021-04-01';
        $to = '2021-04-07';
            
        $players = Player::whereHas('player_activities', function (Builder $query) use($from, $to){
            $query->whereBetween('created_at', [$from, $to]);
        })->get();
        
        return view('player-dau-list', compact('players','from','to'));
    }
    
    public function activateScoringStatus(){        
        
        $scoring_status = ScoringStatus::find(1);    
        $scoring_status->activated = 1;                
        $scoring_status->save();      

        return redirect()->back();
    }

    public function deactivateScoringStatus(){        
        
        $scoring_status = ScoringStatus::find(1);    
        $scoring_status->activated = 0;                
        $scoring_status->save();      
        
        return redirect()->back();
    }

    public function detail($firebase_uuid){        
        $player = Player::find($firebase_uuid);      
        
        $totalScore = 0;

        $playerActivities = PlayerActivity::where([
            ['player_firebase_uuid', '=' , $firebase_uuid],
            ['activity_id', '>=', 3],
            ['activity_id', '<=', 27],            
        ])->get();

        foreach ($playerActivities as $playerActivity) {
            $totalScore += $playerActivity->player_finish_mission->scores;    
        }

        return view('player-detail', compact('player', 'totalScore'));
        
    }

    public function list(){        
        $players = Player::all();        
        return view('player-list', compact('players'));
    }

    public function leaderboard(){        
        $players = Player::all();
        
        $players = $players->sortByDesc(function ($player) {
                    return $player->player_activities->sum('player_finish_mission.scores');
                });
        
        // return $players;
        return view('player-leaderboard', compact('players'));
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
