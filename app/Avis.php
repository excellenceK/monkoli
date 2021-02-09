<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    //

    protected $fillable = ['note', 'commentaire', 'annonce_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function annonce()
    {
        return $this->belongsTo('App\Annonce', 'annonce_id');
    }

}
