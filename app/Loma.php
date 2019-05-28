<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loma extends Model
{
    //
    protected $fillable = [
        'nosaukums'
    ];

    public function nometnes() {
        return $this->hasMany('App\User');
   }
}
