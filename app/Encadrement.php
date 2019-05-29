<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encadrement extends Model
{
    protected $fillable = [
        'enseignant_id','etudiant_id', 'titre','description'
    ];
}
