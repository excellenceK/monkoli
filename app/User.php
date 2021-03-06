<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'prenom', 'genre', 'telephone', 'dateNaissance', 'adresse', 'complementAdresse',
        'ville', 'codePostal', 'pays', 'description', 'typeCompte', 'idEntreprise', 'nomEntreprise', 'paysDomiciliation',
        'photo','cni_verso','cni_recto', 'phone_verified_at', 'cni_verified_at','role'
    ];

    //Relation user to Role.
    public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }

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
}
