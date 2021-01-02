<?php

namespace App\Http\Controllers\Coli;

use App\Annonce;
use Carbon\Carbon;
use App\TransportColis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControlSaisie\ControlSaisieNiveau1;

class coliController extends Controller
{
    //Controller Creation annonce coli
    public function creationAnnonceColi(Request $request){
        //Initialisation

        $idUser = 1;$numerotelUser = '';

        $idAnnonce = $status = $typeTransport = $moyenTransport = $compagnieTransport = $villeDepart =
        $villeArriver = $dateDepart = $dateArriver = $verificationBillet = $lieuDepot =  $unite =
        $quantiteDisponible = $minimunReservation = $dateLimiteReservation = $lieuDepot = $lieuLivraison =
        $devise = $prixUnitaire = "";

        //Récupération des donnees pour la création de l annonce
        $typeAnnonce = ControlSaisieNiveau1::checkInput1($request->typeAnnonce);
        $slug = "visible";
        $niveauPriorite = ControlSaisieNiveau1::checkInput1($request->niveauPriorite);
        $dateCreation =  Carbon::now()->format('Y-m-d H:i');
        $dateExpiration = ControlSaisieNiveau1::checkInput1($request->dateArriver);
        $status = ControlSaisieNiveau1::checkInput1($request->status); //post annonce ou post recherche

        //Recuperation des donnees pour la création du trajet
        //$idUser = ControlSaisieNiveau1::checkInput1($request->idUser);


        $typeTransport = ControlSaisieNiveau1::checkInput1($request->typeTransport);
        $moyenTransport = ControlSaisieNiveau1::checkInput1($request->moyenTransport);
        $compagnieTransport = ControlSaisieNiveau1::checkInput1($request->compagnieTransport);
        $verificationBillet = ControlSaisieNiveau1::checkInput1($request->verificationBillet);

        $villeDepart = ControlSaisieNiveau1::checkInput1($request->villeDepart);
        $villeArriver = ControlSaisieNiveau1::checkInput1($request->villeArriver);

        $lieuDepot = ControlSaisieNiveau1::checkInput1($request->lieuDepot);
        $lieuLivraison = ControlSaisieNiveau1::checkInput1($request->lieuLivraison);

        $dateDepart = ControlSaisieNiveau1::checkInput1($request->dateDepart);
        $dateArriver = ControlSaisieNiveau1::checkInput1($request->dateArriver);

        $unite = ControlSaisieNiveau1::checkInput1($request->unite);
        //$quantiteDisponible =  ControlSaisieNiveau1::checkInput1($request->quantiteDisponible); //

        $minimunReservation =  ControlSaisieNiveau1::checkInput1($request->minimunReservation);
        $dateLimiteReservation =  ControlSaisieNiveau1::checkInput1($request->dateLimiteReservation);

        $devise =  ControlSaisieNiveau1::checkInput1($request->devise);
        $prixUnitaire = ControlSaisieNiveau1::checkInput1($request->prixUnitaire);


        //Instantiation du model Annonce
        $annonce = new Annonce();

        $annonce->user_id = $idUser;
        $annonce->typeAnnonce = $typeAnnonce;
        $annonce->slug = $slug;
        $annonce->niveauPriorite = $niveauPriorite;
        $annonce->dateCreation = $dateCreation;
        $annonce->dateExpiration = $dateExpiration;
        $annonce->status = $status;

        //Enregistrement de l annonce
        $annonce->save();

        //recuperation de l'id de l annonce
        $resultQueryGetAnnonce = DB::select('select * from annonces where user_id = ? and dateCreation = ? ORDER BY id DESC', [$idUser,Carbon::now()->format('Y-m-d H:i')]);
        $getAnnonce = array_map(function($value){
            return (array)$value;
        },$resultQueryGetAnnonce);

        //var_dump($getAnnonce);
        //return json_encode($getAnnonce);

        //Definition de l id de l annonce
        $idAnnonce = $getAnnonce[0]['id'];
       // return $idAnnonce;

        //instantiantion du model TransportColis
        $transportColis = new TransportColis();

        $transportColis->typeTransport = $typeTransport;
        $transportColis->moyenTransport = $moyenTransport;
        $transportColis->compagnieTransport = $compagnieTransport;
        $transportColis->verificationBillet = $verificationBillet;
        $transportColis->villeDepart = $villeDepart;
        $transportColis->villeArriver = $villeArriver;
        $transportColis->lieuDepot = $lieuDepot;
        $transportColis->lieuLivraison = $lieuLivraison;

        $transportColis->dateDepart = $dateDepart;
        $transportColis->dateArriver = $dateArriver;
        $transportColis->unite = $unite;
        //$transportColis->quantiteDisponible = $quantiteDisponible;
        $transportColis->minimunReservation = $minimunReservation;
        $transportColis->dateLimiteReservation = $dateLimiteReservation;
        $transportColis->devise = $devise;
        $transportColis->prixUnitaire = $prixUnitaire;
        $transportColis->annonce_id = $idAnnonce;

        //Enregistrement du trajet
        //$transportColis->save();
        var_dump($transportColis);

    }
    //Controller insertion info bagage et capaciter a transporter
    public function infoTest(Request $request){
        $token = csrf_token();
        return response()->json([
            'status' =>true,
            'csrf' => $token
        ]);
    }
    //Controller insertion info Tarification
    public function infoTarification(Request $request){

    }


}
