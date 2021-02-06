<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ControlSaisie\ControlSaisieNiveau1;

class info extends Controller
{
    //
    public function updateUserInformation(Request $request){
        $name=$email= $prenom=$genre=$telephone=
        $dateNaissance=$adresse=$complementAdresse=$ville=$codePostal=$pays=$description= $typeCompte= null;

        $idUser = Auth::user()->id ;
        if(!empty($request->dateNaissance)){
            $dateNaissance = strtolower(ControlSaisieNiveau1::checkInput1($request->dateNaissance));
        }
       /* if(!empty($request->email)){

        }
        if(!empty($request->email)){

        }*/
        $name = strtolower(ControlSaisieNiveau1::checkInput1($request->name));
        $email = ControlSaisieNiveau1::checkInput1($request->email);
        $prenom = strtolower(ControlSaisieNiveau1::checkInput1($request->prenom));
        $genre = strtolower(ControlSaisieNiveau1::checkInput1($request->genre));
        $telephone = strtolower(ControlSaisieNiveau1::checkInput1($request->telephone));

        $complementAdresse = strtolower(ControlSaisieNiveau1::checkInput1($request->complementAdresse));
        $ville = strtolower(ControlSaisieNiveau1::checkInput1($request->ville));
        $codePostal = strtolower(ControlSaisieNiveau1::checkInput1($request->codePostal));
        $pays = strtolower(ControlSaisieNiveau1::checkInput1($request->pays));
        $description = strtolower(ControlSaisieNiveau1::checkInput1($request->description));
        $typeCompte = strtolower(ControlSaisieNiveau1::checkInput1($request->typeCompte));
        $adresse =  $pays.' '.$ville.' '.$complementAdresse;

        $data = [$name,$email, $prenom,$genre,$telephone,
        $dateNaissance,$adresse,$complementAdresse,$ville,$codePostal,$pays,$description, $typeCompte, $idUser];
        //dd($data);
        $updated = DB::update('update users set name = ? ,email = ? ,prenom = ? ,genre = ? ,
        telephone = ? ,dateNaissance = ?, adresse = ? ,complementAdresse = ? ,
        ville = ? ,codePostal = ? ,pays = ? ,description = ? ,typeCompte = ? where id = ?', $data);

        if($updated == 1){
            dd($updated);
        }

    }
}
