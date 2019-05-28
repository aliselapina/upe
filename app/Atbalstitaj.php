<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atbalstitaj extends Model
{
    //

    protected $fillable = [
        'nosaukums', 'majaslapa', 'epasts', 'numurs', 'rekviziti', 'atbalsta_veids', 
        ];

    public function nometnes() {
        return $this->belongsToMany('App\Nometne');
   }
}
