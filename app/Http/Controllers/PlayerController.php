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

    public function authenticate(Request $request){
        // Retrieve user by uuid or create it if it doesn't exist...
        $flight = Flight::firstOrCreate([
            'uuid' => 'London to Paris'
        ]);
    }
}
