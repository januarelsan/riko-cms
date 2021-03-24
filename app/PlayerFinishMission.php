<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerFinishMission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_activity_id', 'scores', 'play_time',
    ];

    public $timestamps = false;
    
    public function player_activity()
    {
        return $this->belongsTo(PlayerActivity::class);
    }
    
}
