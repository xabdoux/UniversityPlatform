<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'type',
        'titre',
        'description',
        'date_expiration',
        'pieces_jointe_id',
        'publicationable_id',
        'publicationable_type',
        'user_id',
        'ferme',
    ];

   /* protected $casts = [
    'date_expiration' => 'date',
];*/

protected $dates = [
        'date_expiration',
    ];

    public function publicationable()
    {
        return $this->morphTo();
    }

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function commentaires()
    {
        return $this->hasMany('App\Commentaire');
    }

     public function pieces_jointe()
    {
        return $this->belongsTo('App\Pieces_jointe');
    }
}
