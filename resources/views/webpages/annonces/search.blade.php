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
   <div class="card  thumbnail col-12 col-md-12 col-sm-12 col-lg-4" itemscope="" itemtype="http://schema.org/CreativeWork" style="width:auto; padding-left: 0px; padding-right: 0px;">
       <img class="card-img-top img img-responsive"  src="../images/bg_card.png" alt="Card image cap">
       <div class="card-body row">
        <div class="col-5">
            <img src="../images/line-travel.png" style="margin-top: -195px; position: absolute; width: 87%; margin-left: 20px; display: inline-block;">
            <p class="" style="height: 2.5px; background-color: #FFF; margin-right: 10px; margin-top: -110px; width: 100px;color:#FFF">{{ \Carbon\Carbon::parse($trajet['dateDepart'])->format('d-M-Y') }} </p>
            <p style=" position: absolute; display: inline-block; color:#FFF">{{ $trajet['villeDepart'] }}</p>
          </div>
          <div class="col-2">
              <p style="margin-top: -100px;"><i class="fas fa-arrow-right" aria-hidden="true" style="color:white;position: absolute; font-size: large;"></i></p>
          </div>
          <div class="col-5">
            <img src="../images/line-travel.png" style="margin-top: -195px; position: absolute; width: 87%; margin-left: 20px; display: inline-block;">  
            <p class="" style="height: 2.5px; background-color: #FFF; margin-right: 10px; margin-top: -110px; width: 100px; color:#FFF">{{ \Carbon\Carbon::parse($trajet['dateArriver'])->format('d-M-Y') }} </p>
            <p style=" position: absolute; display: inline-block; color:#FFF">{{ $trajet['villeArriver'] }} </p>
          </div>
       </div>
       <div class="card-body row">
           <div class="col-4">
               <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
               <h5 style="font-size: x-small;font-weight: bold; margin-top: 20px;">Transporteur</h5>
               <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{$trajet['nomUser'].' '.$trajet['prenomUser']}}</h6>
               <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
           </div>
           <div class="col-4">
               <p class="" style="color: #00E38C;font-weight: bold;">{{$trajet['prixUnitaire']}}<sup style="color:black">Fcfa</sup><br>
                   <span style="color:black; font-size: x-small;">Par Kg</span>
               </p>
               <p style="color:black;font-size:x-small;">Lieu du dépot du colis à expédier <br>
                   <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ $trajet['lieuDepot'] }}</span>
               </p>
               <p style="color:black;font-size:x-small;">Lieu de récupération du colis à expédier <br>
                   <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ $trajet['lieuLivraison'] }}</span>
               </p>
           </div>
           <div class="col-4">
               @php
                  $quantiteReservee = DB::table('reservations')->where('annonce_id', $trajet['idAnnonce'])->sum('quantiteReserve');
               @endphp
               <p style="color: #00E38C;font-weight: bold;">{{ $trajet['quantiteDisponible']- $quantiteReservee }}<sup style="color:black">Kg</sup><br>
                   <span style="color:black; font-size: x-small;">Disponible(s)</span>
               </p>
               <p style="color:black;font-size:x-small;">Date limite de réservation <br>
                   <span style="font-size: xx-small;font-weight: bold;color:red;">{{\Carbon\Carbon::parse($trajet['dateLimiteReservation'])->format('d-M-Y H:i:s')}}</span>
                   <span style="font-size: xx-small;font-weight: bold;color:red;">GMT</span>
               </p>
           </div>
           <div class="row" style="width: 100%; margin-left: 108px;">
               <div class="col-12 col-md-12 col-lg-12">
                   <br class="d-block d-sm-block d-lg-none d-md-none">
                   <p style="font-size: x-small; margin-left: 42px;">Mode de transport :{{ $trajet['typeTransport'] }} </p>
               </div>
               <!--mode de transport-->
              

           </div>

           <div class="row">
            <div class="col-12 col-md-12 col-lg-3 " style="margin-top: 10px;">
                <a href="#" type="button" class="btn  pure2" style="background-color:#3C3C3C"><i style="color: white; opacity: 0.7;" class="fa fa-share-alt" aria-hidden="true"></i> Partager</a>
            </div>
            <div class="col-12 offset-lg-3 col-lg-6 " style="margin-top:10px;">
                <a href="{{ route('coli.reservationColi',$trajet['idAnnonce']) }}" type="button" class="btn vert pure2"><i style="color: white; opacity: 0.7;" class="far fa-calendar-check" aria-hidden="true"></i> Réserver</a>
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



