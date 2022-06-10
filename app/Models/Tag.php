<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // creo funzione che relaziona questo model ad un altro model
    // essendo many to many la funzione è uguale a quella dell'altro model. cambia solo il nome e il return
    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }
}
