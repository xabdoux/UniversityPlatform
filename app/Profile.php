<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
     protected $fillable = [
        'image','cin', 'cne','biographie', 'date_naiss','adresse',
    ];
}