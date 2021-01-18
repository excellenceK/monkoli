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
<form action="{{ route('typeAnnonce') }}" method="post">
    @csrf
<!-- Modal  type d'annonce -->
<div  class="container typeannonce box-shadow--16dp ">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <h5 style="font-weight: bold;">Choisissez la catégorie d'annonce que vous voulez créer</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 customRadio active" id="customRadio1">
         <input type="radio"   name="choix" id="dreamweaver" value="expédition colis" checked> <label for="dreamweaver">Expédition de colis</label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 customRadio" id="customRadio2">
            <input type="radio"  name="choix" id="dreamweaver1" value="location appartement"> <label for="dreamweaver1">Vente / Location d'appartement</label>
           </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 customRadio" id="customRadio3">
            <input type="radio"  name="choix" id="dreamweaver2" value="location véhicule"> <label for="dreamweaver2">Vente / Location de voiture</label>
           </div>
    </div>

    <div class="row btnfooter">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <button  type="submit" class="btn vert pure-material-button-contained" style="float: right;" > <i style="color:white;" class="fa fa-plus " aria-hidden="true"></i>Créer</button>
            <a href="{{ url('/') }}" type="button" class="btn  pure-material-button-contained" style="float: right; margin-right: 15px; background-color: red;" > <i style="color:white;" class="fa fa-close " aria-hidden="true"></i>Annuler</a>

        </div>
    </div>
</div>
</form>
<!-- Modal  type d'annonce -->
<!-- Modal Type d'annonce -->

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
