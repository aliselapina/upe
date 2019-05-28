<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nometne extends Model
{
    //
    protected $fillable = [
        'nosaukums',
        'sakums',
        'beigas', 
        'vieta', 
        'dalib_sk',
        'apraksts'
    ];

public function users() {
     return $this->belongsToMany('App\User');
}

public function atbalstitajs() {
    return $this->belongsToMany('App\Atbalstitaj');
}


    
}
