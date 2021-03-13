<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    public function playerActivities()
    {
        return $this->hasMany(Activity::class);
    }
}
