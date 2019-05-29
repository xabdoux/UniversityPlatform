<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email','role','profile_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

     public function publications()
    {
        return $this->hasMany('App\Publication');
    }

    public function classes()
    {
        return $this->belongsToMany('App\Classe','classe_users');
    }

    // this is the relationship with the same table
    
    public function encadrants()
    {
        return $this->belongsToMany('App\User', 'encadrements', 'enseignant_id', 'etudiant_id');
       
    }

    public function encadrements()
    {
        return $this->belongsToMany('App\User', 'encadrements', 'enseignant_id', 'etudiant_id');
       
    }
}
