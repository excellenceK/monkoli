<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    //
    protected $fillable = ['quantiteReserve', 'montantReservation', 'dateEntree', 'dateSortie', 'user_id', 'annonce_id',
     'accepter', 'recuperer', 'livrer', 'codeDepot', 'codeRetrait'];

     public function user()
     {
         return $this->belongsTo('App\User', 'user_id');
     }
     public function annonce()
    {
        return $this->belongsTo('App\Annonce', 'annonce_id');
    }
}
