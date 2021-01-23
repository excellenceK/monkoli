<?php

namespace App\Http\Controllers\Coli;

use App\User;
use App\Annonce;
use Carbon\Carbon;
use App\TransportColis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ControlSaisie\ControlSaisieNiveau1;

class coliController extends Controller
{
    //Controller Creation annonce coli
    public function creationAnnonceColi(Request $request){

        $compagnieTransport = $verificationBillet = "null";
        $idUser = 0; $typeCompteUser = "";
        if (!Auth::check()){
            $defaultPassword = 'MotdePasse';
            $telephone = ControlSaisieNiveau1::checkInput1($request->telephone);

            $user = new User();
            $user->telephone = $telephone;
            $user->password = Hash::make($defaultPassword);
            $user->name = strtolower(ControlSaisieNiveau1::checkInput1($request->nom));
            $user->prenom = strtolower(ControlSaisieNiveau1::checkInput1($request->prenom));
            $user->email = strtolower(ControlSaisieNiveau1::checkInput1($request->email));
            $user->typeCompte = 'particulier';

            $user->save();

            $userExist = DB::table('users')
            ->where('telephone',$telephone)
            ->first();

            $idUser = $userExist->id;
            $typeCompteUser = $userExist->typeCompte;
        }
        else{
            $idUser = Auth::user()->id ;
            $typeCompteUser = Auth::user()->typeCompte;
        }

        //Récupération des donnees pour la création de l annonce
        $typeAnnonce = ControlSaisieNiveau1::checkInput1($request->typeAnnonce);
        $slug = ControlSaisieNiveau1::checkInput1('visible');
        $niveauPriorite = '';
        if($typeAnnonce == 'libre'){
            $niveauPriorite = 'niveau 0';
        }
        if($typeAnnonce == 'certifiee'){
            $niveauPriorite = 'niveau 1';
        }
        if($typeAnnonce == 'certifiee urgente'){
            $niveauPriorite = 'niveau 2';
        }
        $dateCreation =  Carbon::now()->format('Y-m-d H:i');
        $dateExpiration = ControlSaisieNiveau1::checkInput1($request->dateLimiteReservation);
        $status = ControlSaisieNiveau1::checkInput1($request->status); //post annonce ou post recherche

        $typeTransport = strtolower(ControlSaisieNiveau1::checkInput1($request->typeTransport));
        $moyenTransport = strtolower(ControlSaisieNiveau1::checkInput1($request->moyenTransport));
        //$compagnieTransport = strtolower(ControlSaisieNiveau1::checkInput1($request->compagnieTransport));
       // $verificationBillet = ControlSaisieNiveau1::checkInput1($request->verificationBillet);

        $villeDepart = strtolower(ControlSaisieNiveau1::checkInput1($request->villeDepart)) ;
        $villeArriver = strtolower(ControlSaisieNiveau1::checkInput1($request->villeArriver)) ;

        $lieuDepot = strtolower(ControlSaisieNiveau1::checkInput1($request->lieuDepot));
        $lieuLivraison = strtolower(ControlSaisieNiveau1::checkInput1($request->lieuLivraison));

        $dateDepart = ControlSaisieNiveau1::checkInput1($request->dateDepart);
        $dateArriver = ControlSaisieNiveau1::checkInput1($request->dateArriver);

        $unite = ControlSaisieNiveau1::checkInput1($request->unite);
        $minimunReservation = ControlSaisieNiveau1::checkInput1($request->minimunReservation);
        $quantiteDisponible =  $unite; //

        //$minimunReservation =  ControlSaisieNiveau1::checkInput1($request->minimunReservation);
        $dateLimiteReservation = str_replace("T"," ",ControlSaisieNiveau1::checkInput1($request->dateLimiteReservation)) ;

        $devise =  strtolower(ControlSaisieNiveau1::checkInput1($request->devise));
        $prixUnitaire = strtolower(ControlSaisieNiveau1::checkInput1($request->prixUnitaire));

        //Instantiation du model Annonce
        $annonce = new Annonce();

        $annonce->user_id = $idUser;
        $annonce->typeAnnonce = $typeAnnonce;
        $annonce->slug = $slug;
        $annonce->niveauPriorite = $niveauPriorite;
        $annonce->dateCreation = $dateCreation;
        $annonce->dateExpiration = $dateExpiration;
        $annonce->status = $status;

        //dd($annonce);certifiee urgente

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
        $transportColis->quantiteDisponible = $quantiteDisponible;
        $transportColis->minimunReservation = $minimunReservation;
        $transportColis->dateLimiteReservation = $dateLimiteReservation;
        $transportColis->devise = $devise;
        $transportColis->prixUnitaire = $prixUnitaire;
        $transportColis->annonce_id = $idAnnonce;

        //Enregistrement du trajet

        //dd($transportColis);
        $transportColis->save();

       /* DB::insert('insert into transport_colis (typeTransport, moyenTransport, compagnieTransport,
        verificationBillet, villeDepart, villeArriver, lieuDepot, lieuLivraison, dateDepart, dateArriver,
        unite,minimunReservation, quantiteDisponible, dateLimiteReservation, devise, prixUnitaire, annonce_id)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$typeTransport, $moyenTransport,
        $compagnieTransport, $verificationBillet, $villeDepart, $villeArriver, $lieuDepot, $lieuLivraison,
        $dateDepart, $dateArriver, $unite,$minimunReservation, $quantiteDisponible, $dateLimiteReservation, $devise, $prixUnitaire,
        $idAnnonce]);*/

       /* DB::insert('insert into transport_colis (typeTransport, moyenTransport, compagnieTransport,
        verificationBillet, villeDepart, villeArriver, lieuDepot, lieuLivraison, dateDepart, dateArriver,
        unite, minimunReservation, dateLimiteReservation, devise, prixUnitaire, annonce_id)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$typeTransport, $moyenTransport,
        $compagnieTransport, $verificationBillet, $villeDepart, $villeArriver, $lieuDepot, $lieuLivraison,
        $dateDepart, $dateArriver, $unite, $minimunReservation, $dateLimiteReservation, $devise, $prixUnitaire,
        $idAnnonce]);*/

        return redirect('/')->with('Message','Annonce enregistrée avec succès');
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
    public function getInfoAnnonce(){

        $typeAnnonce = "";
        //$typeAnnonce = ControlSaisieNiveau1::checkInput1($request->typeAnnonce);

        $resultQueryGetInfoAnnonce = DB::select('select annonces.id as idAnnonce, annonces.slug as slugAnnonce,
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
        from annonces, transport_colis
        where transport_colis.annonce_id = annonces.id
    ORDER BY annonces.niveauPriorite DESC');
    $getInfoAnnonce = array_map(function($value){
        return (array)$value;
    },$resultQueryGetInfoAnnonce);

    return $getInfoAnnonce;
    }

    public function updateAnnonce(Request $request){
        $idAnnonce = "";
        $idAnnonce = ControlSaisieNiveau1::checkInput1($request->idAnnonce);

        $slug = ControlSaisieNiveau1::checkInput1($request->slug);
        $niveauPriorite = ControlSaisieNiveau1::checkInput1($request->niveauPriorite);

        $update = DB::update('update annonces set slug = ? ,niveauPriorite = ?, where id = ?', [$slug,$niveauPriorite,$idAnnonce]);

    }
    public function updateTrajet(Request $request){
        $idTransportColis = "";
        $idTransportColis = ControlSaisieNiveau1::checkInput1($request->idTransportColis);

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
        $quantiteDisponible =   ControlSaisieNiveau1::checkInput1($request->quantiteDisponible); //

        $minimunReservation =  ControlSaisieNiveau1::checkInput1($request->minimunReservation);
        $dateLimiteReservation =  ControlSaisieNiveau1::checkInput1($request->dateLimiteReservation);

        $devise =  ControlSaisieNiveau1::checkInput1($request->devise);
        $prixUnitaire = ControlSaisieNiveau1::checkInput1($request->prixUnitaire);

        $update = DB::update('update transport_colis set typeTransport = ?, moyenTransport = ?,
        compagnieTransport = ?, verificationBillet = ?, villeDepart = ?, villeArriver = ?, lieuDepot = ?,
         lieuLivraison = ?, dateDepart = ?, dateArriver = ?, unite = ?, quantiteDisponible = ?,
          minimunReservation = ?, dateLimiteReservation = ?, devise = ?, prixUnitaire = ?
         where id = ?', [$typeTransport, $moyenTransport, $compagnieTransport, $verificationBillet,
         $villeDepart, $villeArriver, $lieuDepot, $lieuLivraison, $dateDepart, $dateArriver,
         $unite, $quantiteDisponible, $minimunReservation, $dateLimiteReservation, $devise,
         $prixUnitaire,$idTransportColis]);

    }

    public function create($type, $category)
    {
        switch ($category) {
                    case 'libre':
                        # code...
                        return view('webpages.annonces.colis.createLibre')->with(['type' =>$type, 'category' =>$category]);
                        break;
                    case 'certifiee':
                        if (Auth::check()){
                            return view('webpages.annonces.colis.createCertifiee')->with(['type' =>$type, 'category' =>$category]);
                        }
                        else{
                            return redirect('login');
                        }
                        break;
                    case 'certifiee urgente':
                        # code...
                        if (Auth::check()){
                            return view('webpages.annonces.colis.createCertifiee')->with(['type' =>$type, 'category' =>$category]);
                        }
                        else{
                            return redirect('login');
                        }
                        break;
                    default:
                        # code...
                        break;
        }
    }

}
