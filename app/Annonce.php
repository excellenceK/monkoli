<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    protected $fillable = ['slug', 'niveauPriorite', 'dateCreation', 'dateExpiration', 'status', 'typeAnnonce',
    'condAge', 'condAnneePermis', 'garCaution', 'garMontantCaution', 'garPieceIdentite', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
