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
}
