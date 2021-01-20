<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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
        return view('webpages.annonces.user.dash');
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
}
