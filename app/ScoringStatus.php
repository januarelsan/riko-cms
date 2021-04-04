<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoringStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scoring_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activated',
    ];
}
