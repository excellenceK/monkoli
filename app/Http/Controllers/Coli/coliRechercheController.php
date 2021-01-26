<?php

namespace App\Http\Controllers\Coli;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControlSaisie\ControlSaisieNiveau1;

class coliRechercheController extends Controller
{
    //
    public function rechercheColi(Request $request)
    {

        $dateRecherche = $request->dateRecherche;
        $villeDepart = strtolower(ControlSaisieNiveau1::checkInput1($request->villeDepart)) ;
        $villeArriver = strtolower(ControlSaisieNiveau1::checkInput1($request->villeArriver)) ;
        $moyenTransport = strtolower(ControlSaisieNiveau1::checkInput1($request->moyenTransport)) ;


        $clause = 'transport_colis.annonce_id = annonces.id';
        $data = array();
        //$data = 1;
        $message = '';
        if(!empty($villeDepart)){
            $clause = $clause.' and transport_colis.villeDepart = "'.$villeDepart.'"';
        }
        if(!empty($villeArriver)){
            $clause = $clause.' and transport_colis.villeArriver = "'.$villeArriver.'"';
            $message = '';
        }
        if(!empty($dateRecherche)){
            $clause = $clause.' and annonces.dateExpiration >= '.$dateRecherche;
            $message = '';
        }
        if(!empty($moyenTransport)){
            $clause = $clause.' and transport_colis.moyenTransport = "'.$moyenTransport.'"';
            $message = '';
        }
        //dd([$clause]);
        $resultRecherche = DB::select('select users.id as idUser, users.name as nomUser, users.prenom as prenomUser, annonces.id as idAnnonce, annonces.slug as slugAnnonce,
        annonces.niveauPriorite as niveauPrioriteAnnonce, annonces.dateCreation as dateCreationAnnonce,
         annonces.dateExpiration as dateExpirationAnnonce, annonces.status as statusAnnonce,
          annonces.typeAnnonce as typeAnnonce, annonces.condAge as condAgeAnnonce,
           annonces.condAnneePermis as condAnneePermisAnnonce, annonces.garCaution as garCautionAnnonce,
            annonces.garMontantCaution as garMontantCautionAnnonce,
             annonces.garPieceIdentite as garPieceIdentiteAnnonce, annonces.user_id as user_idAnnonce,
              annonces.created_at as created_atAnnonce, annonces.updated_at as updated_atAnnonce,
               transport_colis.id as idTransportColis, transport_colis.typeTransport,
                transport_colis.moyenTransport, transport_colis.compagnieTransport,
                 transport_colis.villeDepart, transport_colis.villeArriver, transport_colis.dateDepart,
                  transport_colis.dateArriver, transport_colis.verificationBillet,transport_colis.unite,
                   transport_colis.quantiteDisponible, transport_colis.minimunReservation,
                   transport_colis.dateLimiteReservation,transport_colis.lieuDepot, transport_colis.lieuLivraison,
                    transport_colis.devise, transport_colis.prixUnitaire
        from annonces, transport_colis, users
            where annonces.user_id = users.id and '.$clause.'
        ORDER BY annonces.niveauPriorite DESC');

        $getAnnonceRechercher = array_map(function($value){
            return (array)$value;
        },$resultRecherche);


        return view('webpages.annonces.search')->with(['resultRecherche'=>$getAnnonceRechercher, 'dateRecherche'=>$dateRecherche,'villeDepart'=>$villeDepart,'villeArriver'=>$villeArriver]);

        /*if(!empty($getAnnonceRechercher)){
            //dd($getAnnonceRechercher);
        }
        else{
            return redirect()->back()->with('message','aucun resultat trouvé !');
           // dd('vide');
        }*/
    }

    public function rechercheColiOption($typeTransport){

        $typeTransport = strtolower(ControlSaisieNiveau1::checkInput1($typeTransport)) ;

        $resultRecherche = DB::select('select users.id as idUser, users.name as nomUser, users.prenom as prenomUser, annonces.id as idAnnonce, annonces.slug as slugAnnonce,
        annonces.niveauPriorite as niveauPrioriteAnnonce, annonces.dateCreation as dateCreationAnnonce,
        annonces.dateExpiration as dateExpirationAnnonce, annonces.status as statusAnnonce,
        annonces.typeAnnonce as typeAnnonce, annonces.condAge as condAgeAnnonce,
        annonces.condAnneePermis as condAnneePermisAnnonce, annonces.garCaution as garCautionAnnonce,
        annonces.garMontantCaution as garMontantCautionAnnonce,
        annonces.garPieceIdentite as garPieceIdentiteAnnonce, annonces.user_id as user_idAnnonce,
        annonces.created_at as created_atAnnonce, annonces.updated_at as updated_atAnnonce,
        transport_colis.id as idTransportColis, transport_colis.typeTransport,
        transport_colis.moyenTransport, transport_colis.compagnieTransport,
        transport_colis.villeDepart, transport_colis.villeArriver, transport_colis.dateDepart,
        transport_colis.dateArriver, transport_colis.verificationBillet,transport_colis.unite,
        transport_colis.quantiteDisponible, transport_colis.minimunReservation,
        transport_colis.dateLimiteReservation,transport_colis.lieuDepot, transport_colis.lieuLivraison,
        transport_colis.devise, transport_colis.prixUnitaire
        from annonces, transport_colis, users
        where annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and transport_colis.typeTransport = ? and annonces.dateExpiration >= (select NOW())
        ORDER BY annonces.niveauPriorite DESC', [$typeTransport]);

        $getAnnonceRechercher = array_map(function($value){
            return (array)$value;
        },$resultRecherche);

        if(!empty($getAnnonceRechercher)){
            dd($getAnnonceRechercher);
        }
        else{
            dd('vide');
        }
    }

    public function getAnnonceCount($typeTransport){
        $typeTransport = strtolower(ControlSaisieNiveau1::checkInput1($typeTransport)) ;

        $count =  DB::select('select count(annonces.id)
        FROM annonces, transport_colis, users
        WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and transport_colis.moyenTransport = "voiture personnelle"', [1]);
    }
}
