<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected  $primaryKey = 'firebase_uuid';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firebase_uuid','name', 'email', 'activated',
    ];

    public $timestamps = false;

    public function isActivated()
    {
        return $this->activated ? true : false;
    }

    public function player_activities()
    {
        return $this->hasMany(PlayerActivity::class)->orderBy('created_at');
    }

    public function player_activities_between_date($from, $to)
    {
        return $this->hasMany(PlayerActivity::class)->where([            
            ['activity_id', '>=', 3],
            ['activity_id', '<=', 27],            
        ])->whereBetween('created_at', [$from, $to])->get();
    }
}
