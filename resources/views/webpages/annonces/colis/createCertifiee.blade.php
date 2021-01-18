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
 <form method="POST" action="" >
     @csrf
    <section class="container typeannonce box-shadow--16dp">
        <div class="row">
            <div class="col">
                <h1>Information sur l'expédition</h1>
                                <!--Select with pure css-->
                                <div class="select">
                                    <select class="select-text" required>
                                        <option value="" disabled selected></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                    <span class="select-highlight"></span>
                                    <span class="select-bar"></span>
                                    <label class="select-label">Mode de transport</label>
                                </div>
                                <br>
                                <!--Select with pure css-->
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="depart" placeholder="Lieu de départ">
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="destination" placeholder="Lieu de destination">
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="destination" placeholder="Lieu de dépôt du colis à expédier">
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="text" name="destination" placeholder="Lieu de retrait du colis à expédier">
                                    <span class="focus-input100"></span>
                                </div>
            </div>
            <div class="col offset-lg-1" style="margin-right: 70px;" >
                <br>
                <div class="select">
                    <select class="select-text" required>
                        <option value="" disabled selected></option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <span class="select-highlight"></span>
                    <span class="select-bar"></span>
                    <label class="select-label">Type de véhicule</label>
                </div>
                <br>
                <div class="wrap-input100 validate-input">
                    <label  for="heureDepart" style="font-size: small;color: #C6C2C2;" >Heure de départ</label>
                    <input class="input100" type="time" name="heureDepart" placeholder="Heure de départ">
                    <span class="focus-input100"></span>
                </div>
                <br>
                <div class="wrap-input100 validate-input">
                    <label for="heureDepart" style="font-size: small;color: #C6C2C2;">Heure de d'arrivée</label>
                    <input class="input100" type="time" name="heureDarrivee" placeholder="Heure de départ">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="col">
                <h3>Mes informations personnelles</h3>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="nom" placeholder="Nom">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="prenom" placeholder="Prenm">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="tel" name="email" placeholder="Téléphone">
                    <span class="focus-input100"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12 col-sm-12 col-md-12">
                 <!--Select with pure css-->
                 <h1>Informations sur le Colis</h1>
            <div class="select">
                <select class="select-text" required>
                    <option value="" disabled selected></option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <span class="select-highlight"></span>
                <span class="select-bar"></span>
                <label class="select-label">Type de colis supportés</label>
            </div>
            <!--Select with pure css-->
            </div>
            <div class="col-lg-3 col-12 col-sm-12 col-md-12 offset-lg-1">
                <br>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="quantiteRecevable" placeholder="Quantite recevable">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="quantiteRecevable" placeholder="Prix unitaire">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="date" name="quantiteRecevable" placeholder="Date limite de réservation">
                    <span class="focus-input100"></span>
                </div>
           </div>
        </div>

       <div class="row btnfooter">
           <div class="col-12 col-lg-12 col-md-12 col-sm-12">
               <button  type="submit" class="btn vert pure-material-button-contained" style="float: right;" > <i style="color:white;" class="fa fa-plus " aria-hidden="true"></i>Créer</button>
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
