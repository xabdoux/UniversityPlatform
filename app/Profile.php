<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
     protected $fillable = [
        'image','couverture','cin', 'cne','biographie', 'date_naiss','adresse','tel',
		'ville',
		'pays',
		'code_postal'
    ];


    public function user()
    {
        return $this->hasOne('App\User');
    }
}