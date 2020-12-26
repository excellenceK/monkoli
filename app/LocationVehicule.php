<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationVehicule extends Model
{
    //
    protected $fillable = ['typeVehicule', 'nbrePlace', 'marque', 'model', 'anneeMiseEnCirculation', 'kilometrage',
    'transmission', 'carburant', 'etat', 'prixParJour', 'avance', 'description', 'photo1', 'photo2', 'photo3', 'photo4',
    'photo5', 'dispoStart', 'dispoEnd', 'budgetClient', 'slugDisponibilite', 'slugChauffeur', 'slugGeneral', 'annonce_id'];
}
