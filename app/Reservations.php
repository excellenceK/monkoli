<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    //
    protected $fillable = ['quantiteReserve', 'montantReservation', 'dateEntree', 'dateSortie', 'user_id', 'annonce_id'];
}
