<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $primaryKey = 'id';        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'question', 'removed',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function isRemoved()
    {
        return $this->removed ? true : false;
    }
}
