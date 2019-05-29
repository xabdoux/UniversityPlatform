<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nom','code_acces', 'promotion','admin_id'
    ];


    public function users()
    {
        return $this->belongsToMany('App\User','classe_users');
    }

    public function modules()
    {
        return $this->hasMany('App\Module');
    }

    public function publications()
    {
        return $this->morphMany('App\Publication', 'publicationable');
    }
}
