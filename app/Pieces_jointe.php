<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieces_jointe extends Model
{
     protected $fillable = [
        'title','type', 'pieces_jointes'
    ];



    public function publication()
    {
        return $this->hasOne('App\Publication');
    }
}
