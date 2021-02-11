@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Monkoli-recherche</title>
@endsection
@section('main')
    <!--inscription main content-->
    <!--pub brand section-->
    <section class="container pub-brand ">
        <div class="row col-md-12 col-lg-12 col-sm-12 col-12 brand">
        </div>
    </section>
    <!--pub brand section-->
    <br/><br/>
    <!--search section-->
    <div class="container">
        <div class="row">
            <span class="col-12">
                <form class="form col-12 col-md-12 col-lg-12 col-sm-12" method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                    @csrf
                     <div class="row">
                       <div class="col-12 col-md-4 col-lg-4 col-sm-12">
                              <input type="text" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?" value="{{$villeDepart}}">
                              <span class="fa fa-sort-down fa-lg icon"></span>
                        </div>
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <div class="col-12 col-md-3 col-lg-3 col-sm-12">
                          <input type="text" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?" value="{{$villeArriver}}">
                          <span class="fa fa-sort-down fa-lg icon"></span>
                        </div>
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <div class="col-12 col-md-3 col-lg-3 col-sm-12">
                          <input type="date" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?" value="{{$dateRecherche}}">
                        </div>
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <span class="col-12 col-md-2 col-lg-2 col-sm-12" ><button type="submit" class="btn vert pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Trouver</button></span>
                     </div>
                  </form>
            </span>
           </div>
    </div>
   <!--search section-->
   <br>
   <br>
   <!--resultats-->
   <section class="container-fluid annonce">
    <div class="row">
        <h1 class="col-12">
            Annonces({{count($resultRecherche)}})
        </h1>
    </div>

    <br>
</section>
<section class="container">
   <div class="row">
   <!-- Result items-->
   @if (sizeof($resultRecherche) == 0)
       <p> Aucun resultat trouvé</p>
   @else
   @foreach ($resultRecherche as $trajet)
   <div class="card  carsel thumbnail   item "itemscope="" itemtype="http://schema.org/CreativeWork">
    <img class="card-img-top img img-responsive"  src="../images/bg_card.png" alt="Card image cap" style="margin-top: -19px;">
    <div class="card-body row" >
        <div class="col-5">
           <div class="col-xs-2 col-lg-11 no-padding" id="trajet" style="position: relative; margin-top: -140px; margin-left: 0px; height: 60px; border-bottom: solid 1px #FFF; height: 40px;">
            <span class="dot" >
            <br>
            <p style="text-align: left; margin-left: 0px; color: white; font-size: 9px; width: max-content;">Départ</p>
          </span>
            <!--h2 style="text-align: left; font-weight: bolder; color: #FFF;">CI</h2-->
            <h6 style="text-align: left; font-weight: bold; color: #FFF;">{{ strtoupper($trajet['villeDepart']) }}</h6>
          </div>
          </div>
          <div class="col-2">
              <p style="margin-top: -50px;"><i class="fas fa-arrow-right" style="text-align: center; position: relative; margin-top: -40px; font-size: 20px; color: white;"></i></p>
          </div>
          <div class="col-5">
             <div class="col-xs-2 col-lg-12 no-padding" id="trajet" style="position: relative; margin-top: -140px; margin-left: 0px; height: 60px; border-bottom: solid 1px #FFF; height: 40px;">
              <span class="dot" style=" float: right ;margin-left: 90%; color: white; ">
                <br>
                <p style="text-align: right; margin-left: -19px; color: white; font-size: 9px;">Arrivée</p>
              </span>
              <!--h2 style="text-align: right; font-weight: bolder; color: #FFF;">FRA</h2-->
              <h6 style="text-align: right; font-weight: bold; color: #FFF;">{{ strtoupper($trajet['villeArriver']) }}</h6>
            </div>
          </div>
          <div class="col-4">
              <div class="col-xs-2 col-lg-12 no-padding" id="datetime" ><i class="fas fa-calendar-day" style="color: black;"></i>
              <span style=" text-align : center;">{{\Carbon\Carbon::parse($trajet['dateDepart'])->format('d-M-Y')}}</span>
              </div>
          </div>

          <div class="col-4">
              <div class="col-xs-2 col-lg-12 no-padding"  >
                <span style=" text-align : center;"></span>
              </div>
          </div>

          <div class="col-4">
             <div class="col-xs-2 col-lg-12 no-padding" id="datetime"><i class="fas fa-calendar-day" style="color: black;"></i>
              <span style=" text-align : center;">{{\Carbon\Carbon::parse($trajet['dateArriver'])->format('d-M-Y')}}</span>
            </div>
          </div>
    </div>
    <div class="card-body row" style="padding-top: 0px; margin-top: -20px;">
      <div class="col-4">
          <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2; font-size: 50px;" aria-hidden="true"></i>
          <br><br>
          <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
          <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ strtoupper($trajet['nomUser']).' '. ucwords($trajet['prenomUser']) }}</h6>
          <i class="fa fa-star valide"  aria-hidden="true" style="font-size: x-small;"></i><i class="fa fa-star valide" aria-hidden="true" style="font-size: x-small;"></i><i class="fa fa-star valide" aria-hidden="true" style="font-size: x-small;"></i><i class="fa fa-star valide" aria-hidden="true" style="font-size: x-small;"></i><i class="fa fa-star novalide" aria-hidden="true" style="font-size: x-small;"></i>
      </div>
      <div class="col-4">
        <p class="" style="color: #00E38C;font-weight: bold;">{{ strtoupper($trajet['prixUnitaire']) }}<sup style="color:black">{{ strtoupper($trajet['devise']) }}</sup><br>
          <span style="color:black; font-size: x-small;">Par Kg</span>
        </p>
         <p style="color:black;font-size:x-small; font-weight: bold;">Lieu du dépot du colis à expédier <br>
            <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ strtoupper($trajet['lieuDepot']) }}</span>
        </p>
        <p style="color:black;font-size:x-small; font-weight: bold;">Lieu de récupération du colis à expédier <br>
            <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ strtoupper($trajet['lieuLivraison']) }}</span>
        </p>
        <br class="d-block d-sm-block d-lg-none d-md-none">
        <p style="font-size: x-small; font-weight: bold;">Mode de transport : {{ strtoupper($trajet['moyenTransport']) }}</p>
      </div>
      <div class="col-4">
            <p style="color: #00E38C;font-weight: bold;">{{ strtoupper($trajet['quantiteDisponible']) }}<sup style="color:black"> Kg</sup><br>
           <span style="color:black; font-size: x-small;">Disponible(e)</span>
       </p>
        <p style="color:black;font-size:x-small; font-weight: bold;">Date limite de réservation <br>
           <span style="font-size: xx-small;font-weight: bold;color:red;">{{\Carbon\Carbon::parse($trajet['dateLimiteReservation'])->format('d-M-Y')}}</span>
           <!--span style="font-size: xx-small;font-weight: bold;color:red;">20:00 GMT</span-->
           <br><br><br><br><br><br><br>
           
           <!--span> <img class="img img-responsive"  style="height:50px;width: 50px;" src="../images/Avion.png" alt="avion"></span-->
       </p>
     </div>

    <div class="col-sm-12">
      <div class="col-lg-6" style="float: left; display: ;">
            <button type="button" class="btn pure2 " style="background-color:#3C3C3C;"> <i style="color: white; opacity: 0.7;" class="fas fa-share" aria-hidden="true"></i> Partager l'annonce</button>
        </div>
        <div class="col-lg-5" style="float: right; display: inline-block;">
            <a href="{{ route('coli.reservationColi',$trajet['idAnnonce']) }}" type="button" class="btn vert pure2"><i style="color: white; opacity: 0.7;" class="far fa-calendar-check" aria-hidden="true"></i>&nbsp;&nbsp;Réserver</a>
        </div>
    </div>
  </div>
</div>
  @endforeach
   @endif




</div>
</section>
<br>
<br>
@endsection



