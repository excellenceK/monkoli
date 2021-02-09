<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportColis extends Model
{
    //
    protected $fillable = ['typeTransport', 'moyenTransport', 'compagnieTransport', 'villeDepart', 'villeArriver',
    'dateDepart', 'dateArriver', 'verificationBillet', 'unite', 'quantiteDisponible', 'minimunReservation',
    'dateLimiteReservation', 'lieuDepot', 'lieuLivraison', 'devise', 'prixUnitaire', 'annonce_id'];

    public function annonce()
    {
        return $this->belongsTo('App\Annonce', 'annonce_id');
    }
}
