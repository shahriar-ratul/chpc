<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function card()
    {
        return $this->belongsTo('App\Card','payment_method','id');
    }
}
