@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/annonce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">


    <title>monkoli-poster-annonce</title>
@endsection

@section('main')
<br><br><br class="d-sm-none d-none d-lg-block d-md-none"><br class="d-sm-none d-none d-lg-block d-md-none"><br class="d-sm-none d-none d-lg-block d-md-none">
<section class="container-fluid titre">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <h1 class="h1" style="font-weight: bold;">Poster une annonce</h1>
        </div>
    </div>
</section>

<!-- Modal type d'annonce -->
 <!-- formulaire d'expédition de colis -->
 <form  method="POST" action="{{ route('coli.createAnnonceValidated') }}">
    @csrf
    <section class="container typeannonce box-shadow--16dp" style="background-color: white">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <h1>Information sur l'expédition</h1>
                                <!--Select with pure css-->
                                <div class="select" style="width: 100%">
                                    <select class="select-text" style="width: 100%" required name = 'typeTransport'>
                                        <option value="" disabled selected></option>
                                        <option value="Aerien"> Véhicule Aérien</option>
                                        <option value="Ferroviaire"> Véhicule Ferroviaire</option>
                                        <option value="Maritime"> Véhicule Maritime</option>
                                        <option value="Terrestre"> Véhicule Terrestre </option>
                                    </select>
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Type de transport</label>
                                </div>
                                <br>
                                <!--Select with pure css-->
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="villeDepart" placeholder="Ville de départ" required>
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="villeArriver" placeholder="Ville d' arriver" required>
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="lieuDepot" placeholder="Lieu de depôt du colis" required>
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="lieuLivraison" placeholder="Lieu de livraison du colis" required>
                                    <span class="focus-input100"></span>
                                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 offset-lg-1" style="margin-right: 70px;" >
                <br class="d-none d-md-none d-lg-block">
                <br class="d-none d-md-none d-lg-block">
                <br class="d-none d-md-none d-lg-block">
                <br class="d-none d-md-none d-lg-block">
                <br class="d-none d-md-none d-lg-block">
                <br class="d-none d-md-none d-lg-block">
                <br class="d-none d-md-none d-lg-block">
                <div class="select" style="width: 100%">
                    <select class="select-text" style="width: 100%" required name = 'moyenTransport' required>
                        <option value="" disabled selected></option>
                        <option value="Avion">Avion</option>
                        <option value="Bateau">Bateau</option>
                        <option value="Voiture personnelle">Voiture personnelle</option>

                        <option value="Train">Train</option>


                    </select>
                    <span class="select-highlight"></span>
                    <span class="select-bar"></span>
                    <label class="select-label">Type de véhicule</label>
                </div>
                <br>
                <div class="wrap-input100 validate-input">
                    <label  for="dateDepart" style="font-size: small;color: #C6C2C2;" >Date de départ</label>
                    <input class="input100" type="date" name="dateDepart" placeholder="Date de départ" required>
                    <span class="focus-input100"></span>
                </div>
                <br>
                <div class="wrap-input100 validate-input">
                    <label for="dateArriver" style="font-size: small;color: #C6C2C2;">Date d'arrivée</label>
                    <input class="input100" type="date" name="dateArriver" placeholder="Date d' arrivée" required>
                    <span class="focus-input100"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12 col-sm-12 col-md-12">
                 <!--Select with pure css-->
                 <h1>Informations sur le Colis</h1>
                 <!--
                 <div class="select" style="width: 100%">
                    <select class="select-text" style="width: 100%" required name = 'moyenTransport' required>
                        <option value="" disabled selected></option>
                        <option value="option">option 1</option>
                        <option value="option">option 2</option>
                        <option value="option">option 2</option>
                        <option value="option">option 3</option>
                    </select>
                    <span class="select-highlight"></span>
                    <span class="select-bar"></span>
                    <label class="select-label">Type de supporté</label>
                </div>
                -->
            <!--Select with pure css-->
            </div>
            <div class="col-lg-3 col-12 col-sm-12 col-md-12 offset-lg-1">
                <br>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="unite" placeholder="Quantite a transporter (en Kg)" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="minimunReservation" placeholder="Qte mini a réserver (en Kg)" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="select" style="width: 100%;">
                <select class="select-text" name = 'devise' required>
                    <option value="" disabled selected></option>
                    <option value="euro">Euro</option>
                    <option value="dollar">Dollar</option>
                    <option value="fcfa">FCFA</option>
                </select>
                <label class="select-label">Dévise</label>
                <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="prixUnitaire" placeholder="Prix unitaire par Kg" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <label  for="dateDepart" style="font-size: small;color: #C6C2C2;" >Date limite de réservation</label>
                    <input class="input100" type="date" name="dateLimiteReservation" placeholder="Date limite de réservation" required>
                    <span class="focus-input100"></span>
                </div>
           </div>
        </div>
        <input type="hidden" name="status" value="post">
        <input type="hidden" name="typeAnnonce" value="{{$category}}">


       <div class="row btnfooter">
           <div class="col-12 col-lg-12 col-md-12 col-sm-12">

               <button id="vbtn" type="submit" name = 'annonceSubmited'
               class="btn vert pure-material-button-contained"style="float: right;" >
                    <i style="color:white;" class="fa fa-plus " aria-hidden="true"></i>
                    Créer
                </button>
               <a href="{{ url('type-annonce/'.$type) }}" type="button" class="btn  pure-material-button-contained" style="float: right; margin-right: 15px; background-color: red;" > <i style="color:white;" class="fa fa-close " aria-hidden="true"></i>Annuler</a>
           </div>
       </div>


   </section>

  </form>
  <div style="height: 15px">
  </div>




  <!-- formulaire de location d'appartement -->


   <!-- formulaire de location de voiture -->


@endsection
<!--js part-->
@section('js')
    <script type="text/javascript" src="{{ asset('js/pannonce.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/posterAnnonce.js') }}"></script>
@endsection




<!--

-->
