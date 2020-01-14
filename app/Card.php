<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function service()
    {
        return $this->belongsToMany('App\Service')->withTimestamps();
    }
}
