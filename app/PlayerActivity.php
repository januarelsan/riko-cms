<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerActivity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_firebase_uuid', 'activity_id', 'created_at',
    ];

    public $timestamps = true;

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function player_quiz_answer()
    {
        return $this->hasOne(PlayerQuizAnswer::class);
    }

    

    
}
