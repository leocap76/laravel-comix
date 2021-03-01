<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    //relazione una a molti
    public function category() {
        return $this->belongsTo('App/Category');
    }
    // relazione molti a molti
    public function characters() {
        return $this->belongsToMany('App/Character');
    }
}
