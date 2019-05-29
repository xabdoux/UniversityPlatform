<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

	protected $fillable = [
        'nom','classe_id', 'enseignant_id'
    ];


    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }

    public function publications()
    {
        return $this->morphMany('App\Publication', 'publicationable');
    }

}
