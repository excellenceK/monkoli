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
                <form class="form col-12 col-md-12 col-lg-12 col-sm-12">
                   <div class="row">
                     <div class="col-12 col-md-4 col-lg-4 col-sm-12">
                            <input type="text" class="form-control col-12" id="inputEmail3" placeholder="D'où part le colis?">
                            <span class="fa fa-sort-down fa-lg icon"></span>
                      </div>
                      <br class="d-block d-sm-block d-lg-none d-md-none">
                      <br class="d-block d-sm-block d-lg-none d-md-none">
                      <div class="col-12 col-md-3 col-lg-3 col-sm-12">
                        <input type="text" class="form-control col-12" id="inputPassword3" placeholder="Où voulez vous l'expédier?">
                        <span class="fa fa-sort-down fa-lg icon"></span>
                      </div>
                      <br class="d-block d-sm-block d-lg-none d-md-none">
                      <br class="d-block d-sm-block d-lg-none d-md-none">
                      <div class="col-12 col-md-3 col-lg-3 col-sm-12">
                        <input type="date" class="form-control col-12" id="inputPassword3" placeholder="Quand voulez vous l'envoyer?">
                      </div>
                      <br class="d-block d-sm-block d-lg-none d-md-none">
                      <br class="d-block d-sm-block d-lg-none d-md-none">
                      <span class="col-12 col-md-2 col-lg-2 col-sm-12" ><button type="button" class="btn vert pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Trouver</button></span>
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
            Annonces
        </h1>
    </div>
    <div class="row">
        <div class="col-6 col-sm-6 col-lg-1 col-md-4 ">
         <button type="button" class="btn vert pure-material-button-contained">Tout(170)</button>
        </div>
        <div class="col-6 col-sm-6 col-lg-1 col-md-4" >
         <button type="button" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: black;" class="fa fa-plane" aria-hidden="true"></i> Avion(13)</button>
        </div>
        <br class="d-block d-sm-block d-lg-none d-md-block">
        <br class="d-block d-sm-block d-lg-none d-md-block">

        <div class="col-6 col-sm-6 col-lg-1 col-md-4">
         <button type="button" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: black;" class="fa fa-plane" aria-hidden="true"></i> Avion(13)</button>
        </div>
        <div class="col-6 col-sm-6 col-lg-1 col-md-4">
         <button type="button" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: black;" class="fa fa-plane" aria-hidden="true"></i> Avion(13)</button>
        </div>
        <br class="d-block d-sm-block d-lg-none d-md-block">
        <br class="d-block d-sm-block d-lg-none d-md-block">

        <div class="col-6 col-sm-6 col-lg-1 col-md-4">
         <button type="button" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: black;" class="fa fa-plane" aria-hidden="true"></i> Avion(13)</button>
        </div>
        <div class="col-6 col-sm-6 col-lg-1 col-md-4">
         <button type="button" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: black;" class="fa fa-plane" aria-hidden="true"></i> Avion(13)</button>
        </div>
    </div>
    <br>
</section>
<section class="container">
   <div class="row">
   <!-- Result items-->
   <div class="card  thumbnail col-12 col-md-12 col-sm-12 col-lg-4" itemscope="" itemtype="http://schema.org/CreativeWork" style="width:auto; padding-left: 0px; padding-right: 0px;">
    <img class="card-img-top img img-responsive"  src="../images/Bg-MonKoli.jpg" alt="Card image cap">
    <div class="card-body row">
      <div class="col-4">
        <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
        <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
        <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">phineas kouadio</h6>
        <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
      </div>
      <div class="col-4">
         <p class="" style="color: #00E38C;font-weight: bold;">XXXX<sup style="color:black">Fcfa</sup><br>
            <span style="color:black; font-size: x-small;">Par Kg</span>
        </p>
         <p style="color:black;font-size:x-small;">Lieu du dépot du colis à expédier <br>
            <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">Imeuble, koumassi cytidia</span>
        </p>
        <p style="color:black;font-size:x-small;">Lieu de récupération du colis à expédier <br>
            <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">Paris, koumassi cytidia</span>
        </p>
      </div>
      <div class="col-4">
        <p style="color: #00E38C;font-weight: bold;">XXXX<sup style="color:black">Kg</sup><br>
           <span style="color:black; font-size: x-small;">Disponible(e)</span>
       </p>
        <p style="color:black;font-size:x-small;">Date limite de réservation <br>
           <span style="font-size: xx-small;font-weight: bold;color:red;">30/12/2020</span>
           <span style="font-size: xx-small;font-weight: bold;color:red;">20:00 GMT</span>
       </p>
     </div>
     <div class="row">
            <div class="col-8">
                <br class="d-block d-sm-block d-lg-none d-md-none">
                <p style="font-size: x-small;">Mode de transport :</p>
            </div>
            <div class="col-4">
                <span> <img class="img img-responsive"  style="height:40px;width: 40px;" src="../images/Avion.png" alt="avion"></span>
            </div>
     </div>
     <div class="row">
        <div class="col">
            <button type="button" class="btn pure-material-button-contained offset-lg-2 offset-md-2" style="background-color:#3C3C3C; margin-right:6px;"> <i style="color: black;" class="fa fa-share-alt " aria-hidden="true"></i> Partager l'annonce</button>
        </div>
        <br class="d-block d-sm-block d-lg-none d-md-none">
        <br class="d-block d-sm-block d-lg-none d-md-none">
        <div class="col">
            <button type="button" class="btn vert pure-material-button-contained"> <i style="color: black;" class="fa fa-calendar " aria-hidden="true"></i> Réserver</button>
        </div>
     </div>
    </div>
</div>
<div class="card  thumbnail col-12 col-md-12 col-sm-12 col-lg-4" itemscope="" itemtype="http://schema.org/CreativeWork" style="width:auto; padding-left: 0px; padding-right: 0px;">
    <img class="card-img-top img img-responsive"  src="../images/Bg-MonKoli.jpg" alt="Card image cap">
    <div class="card-body row">
      <div class="col-4">
        <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
        <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
        <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">phineas kouadio</h6>
        <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
      </div>
      <div class="col-4">
         <p class="" style="color: #00E38C;font-weight: bold;">XXXX<sup style="color:black">Fcfa</sup><br>
            <span style="color:black; font-size: x-small;">Par Kg</span>
        </p>
         <p style="color:black;font-size:x-small;">Lieu du dépot du colis à expédier <br>
            <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">Imeuble, koumassi cytidia</span>
        </p>
        <p style="color:black;font-size:x-small;">Lieu de récupération du colis à expédier <br>
            <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">Paris, koumassi cytidia</span>
        </p>
      </div>
      <div class="col-4">
        <p style="color: #00E38C;font-weight: bold;">XXXX<sup style="color:black">Kg</sup><br>
           <span style="color:black; font-size: x-small;">Disponible(e)</span>
       </p>
        <p style="color:black;font-size:x-small;">Date limite de réservation <br>
           <span style="font-size: xx-small;font-weight: bold;color:red;">30/12/2020</span>
           <span style="font-size: xx-small;font-weight: bold;color:red;">20:00 GMT</span>
       </p>
     </div>
     <div class="row">
            <div class="col-8">
                <br class="d-block d-sm-block d-lg-none d-md-none">
                <p style="font-size: x-small;">Mode de transport :</p>
            </div>
            <div class="col-4">
                <span> <img class="img img-responsive"  style="height:40px;width: 40px;" src="../images/Avion.png" alt="avion"></span>
            </div>
     </div>
     <div class="row">
        <div class="col">
            <button type="button" class="btn pure-material-button-contained offset-lg-2 offset-md-2" style="background-color:#3C3C3C; margin-right:6px;"> <i style="color: black;" class="fa fa-share-alt " aria-hidden="true"></i> Partager l'annonce</button>
        </div>
        <br class="d-block d-sm-block d-lg-none d-md-none">
        <br class="d-block d-sm-block d-lg-none d-md-none">
        <div class="col">
            <button type="button" class="btn vert pure-material-button-contained"> <i style="color: black;" class="fa fa-calendar " aria-hidden="true"></i> Réserver</button>
        </div>
     </div>
    </div>
</div>

</div>
</section>
<br>
<br>
@endsection


