<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    

    protected $fillable = [
        'description','pieces_jointe_id', 'user_id','publication_id',
    ];


    public function publication()
    {
        return $this->belongsTo('App\Publication');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pieces_jointe()
    {
        return $this->belongsTo('App\Pieces_jointe');
    }
}
