<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // rendo fillable le chiavi
    protected $fillable= [
        'category_id', 'title', 'content', 'image', 'slug'
    ];

    // creo funzion che mi dice in che relaione è con una tabella
    // visto che 1 categoria può avere più post questo model è secondario
    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }

    // creo funzione che relaziona questo model ad un altro model
    // essendo many to many la funzione è uguale a quella dell'altro model. cambia solo il nome e il return
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
