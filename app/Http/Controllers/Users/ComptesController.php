<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComptesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.monespace');

        }else{
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $users = new User();
        $users->name = $request->nom;
        $users->prenom = $request->prenom;
        $users->genre = $request->genre;
        $users->telephone = $request->telephone;
        $users->dateNaissance = $request->dateNaissance;
        $users->adresse = $request->adresse;
        $users->complementAdresse = $request->complementAdresse;
        $users->ville = $request->ville;
        $users->codePostal = $request->codePostal;
        $users->pays = $request->pays;
        $users->description = $request->description;
        $users->typeCompte = $request->typeCompte;
        $users->idEntreprise = $request->idEntreprise;
        $users->nomEntreprise = $request->nomEntreprise;
        $users->paysDomiciliation = $request->paysDomiciliation;
        $users->photo = $request->photo;
        $users->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function consulterAnnonce()
    {

        return view('webpages.annonces/user/annonceEnCours');
    }
    public function consulterReservations($id)
    {
        return view('webpages.annonces/user/liste-reservation')->with(['annonce_id'=>$id]);
    }

    public function accepterReservation($id)
    {
        $reservation=Reservations::findOrFail($id);

        if ( $reservation->update([
            'accepter' =>true
        ])) {
            # code...
            return back()->with('success', 'Votre avis a été enrégistré avec succès. Le demandeur sera notifié !');
        }

        //dd($category);
        //$data= true;
        // return $data;
    }

    public function refuserReservation($id)
    {
        $reservation=Reservations::findOrFail($id);

        if ( $reservation->update([
            'accepter' =>false
        ])) {
            # code...
            return back()->with('success', 'Votre avis a été enrégistré avec succès. Le demandeur sera notifié !');
        }
    }

    public function monProfile()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.monprofile');

        }else{
            return redirect('login');
        }
    }


    public function coliTransportes()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.coli-transportes');

        }else{
            return redirect('login');
        }
    }


    public function verificationCompte()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.verification-compte');

        }else{
            return redirect('login');
        }
    }

    public function avisUtilisateurs()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.avis-utilisateurs');

        }else{
            return redirect('login');
        }
    }

    public function notifications()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.notifications');

        }else{
            return redirect('login');
        }
    }

    public function changePassword()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.change-password');

        }else{
            return redirect('login');
        }
    }

    public function fermetureCompte()
    {
        if (Auth::check()) {
            # code...
            return view('webpages.annonces.user.fermeture-compte');

        }else{
            return redirect('login');
        }
    }

}
