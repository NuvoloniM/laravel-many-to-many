<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //rendo fillable i dati 
    protected $fillable = [
        'label', 'color'
    ];

    // funzion che mi collega le tabelle
    // essendo 1 categoria + post questa è la tabella principale
    public function Post(){
        return $this->hasMany('App\Models\Post');
    }
}
