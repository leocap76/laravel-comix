<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'image_hero',
        'description'
    ];
    // relazione molti a molti
    public function comics() {
        return $this->belongsToMany('App/Comic');
    }
}
