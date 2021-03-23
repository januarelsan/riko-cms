<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerQuizAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_activity_id', 'option_id',
    ];

    public $timestamps = false;
    
    public function player_activity()
    {
        return $this->belongsTo(PlayerActivity::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
