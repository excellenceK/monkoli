<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationAppartement extends Model
{
    //
    protected $fillable = ['typeResidence', 'nbrePiece', 'pays', 'ville', 'quartier', 'autrePrecision', 'prixParJour',
    'avance', 'description', 'photo1', 'photo2', 'photo3', 'photo4',
    'photo5', 'dispoStart', 'dispoEnd', 'budgetClient', 'slugDisponibilite', 'slugGeneral', 'annonce_id'];
}
