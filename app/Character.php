<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    // relazione molti a molti
    public function comics() {
        return $this->belongsToMany('App/Comic');
    }
}
