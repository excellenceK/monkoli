@php
    $resultQueryGetInfoAnnonce = DB::select('select users.id as idUser, users.name as nomUser, users.prenom as prenomUser, annonces.id as idAnnonce, annonces.slug as slugAnnonce,
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
        from annonces, transport_colis, users
        where transport_colis.annonce_id = annonces.id and annonces.user_id = users.id
    ORDER BY annonces.niveauPriorite DESC');

    $getInfoAnnonce = array_map(function($value){
        return (array)$value;
    },$resultQueryGetInfoAnnonce);
    //dd($getInfoAnnonce);
    $check = true;
    if(empty($getInfoAnnonce)){
        $check = true;
    }
    else{
        $check = false;
    }
    //$check = true;
    //$check = $getInfoAnnonce->isEmpty();

    //return $getInfoAnnonce;
@endphp

    <!--pub brand section-->
    <section class="container pub-brand ">
        <div class="row col-md-12 col-lg-12 col-sm-12 col-12 brand">
        </div>
    </section>
    <!--pub brand section-->
    <br/><br/>
    <!--two button section-->
    <section class="container-fluid" >
        <div class="row"  >

                      <div class="post-btn col-12 col-lg-12 col-md-12">
                        <a href="{{ route('searchAnnonce') }}"><button type="button" class="offset-lg-4 btn gris pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Voir Annonces</button></a>
                        <a style="text-decoration: none;" href="{{ route('createAnnonce') }}"><button  type="button" class="btn  vert  pure-material-button-contained d-none d-sm-none d-lg-inline d-md-none"> <i class="fa fa-plus"></i> Publier une annonce en moins de 30 s</button></a>
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <br class="d-block d-sm-block d-lg-none d-md-block">
                        <a style="text-decoration: none;" href="{{ route('createAnnonce') }}"><div class=" d-block d-sm-block d-lg-none d-md-block" ><button type="button" class="btn  vert  pure-material-button-contained"> <i class="fa fa-plus"></i> Publier Annonce </button></div></a>
                       </div>


        </div>

    </section>
    <!--End two button-->
    <br/>
    <!--Categories section-->
    <section class="container-fluid " style="padding-left: 0;">
        <div class="row" >
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 side1">
                <img class="img img-responsive" src="images/Bg-MonKoli.jpg" alt="side1" srcset="">
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-md-3">
                    <h2>Catégories</h2>
                    <span>Monkoli vous aide à expédier votre colis selon le canal de distribution souhaité:</span>
                    <div class="row">
                        <div class="col">
                                Avion
                        </div>
                        <div class="col">
                            Bateau
                        </div>
                        <div class="col">
                            Train
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                Avion
                        </div>
                        <div class="col">
                            Bateau
                        </div>
                        <div class="col">
                            Train
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                Avion
                        </div>
                        <div class="col">
                            Bateau
                        </div>
                        <div class="col">
                            Train
                        </div>
                    </div>
                    <div class="row" style="padding: 2px; margin: 0;">
                        <h3 class="col-12">Location de résidence</h3>
                        <p class="col-12" style="font-size: small;">Besoin d'un appartement selon vos besoin?</p>
                        <span class="col-12" ><button type="button" class="btn vert pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Voir Annonces</button></span>
                    </div>
                    <div class="row" style="padding: 2px; margin: 0;">
                        <h3 class="col-12">Location de voiture</h3>
                        <p class="col-12" style="font-size: small;">Besoins d'un véhicule pour vos course?</p>
                        <span class="col-12" ><button type="button" class="btn vert pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Voir Annonces</button></span>
                    </div>
            </div>

        </div>
    </section>
    <!--End Categories section-->
   <br/>
   <section style="height:auto">
    <section class="container-fluid search">
        <div class="row ">
            <div class="col-12 col-md-12 col-sm-12 col-lg-12" style="padding:5;">
               <h1 id="searhHeading">Expédier votre colis n'a jamais été aussi  simple!<img src="images/logo.png"  class="searchlogo  img img-responsive" alt="logo"/></h1>
               <h5>Recherchez et trouver le transporteur <span style="color:#079860;">idéal</span> au moment <span style="color:#079860;">opportun.</span></h5>
               <h3 style="color: #079860;">Facile<span style="color:white;">,</span> Rapide<span style="color:white;"> et</span> Fiable</h3>
            </div>
        </div>
        <br/>
        <br/>
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
        <br/>
        <h7>Gagnez de l'argent en transportant des colis.<span style="color:#079860; text-decoration: underline;"> Poster une annonce</span></h7>
    </section>
   </section>

   <!-- End search section-->
   <!-- Annonse-->

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
   <div class="container-fluid">
    @if ($check == false)
    <div id="owl-demo-2" class="row">
        <div class="col-1 prev navprev d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <br class="d-none d-sm-none d-md-inline d-lg-block">
         <i style="font-weight: bold;" class="fa fa-5x fa-angle-left " aria-hidden="true"></i>
        </div>
        <div class="col-12 col-lg-10 col-md-10 col-sm-12  owl-carousel owl-theme">
            @foreach ($getInfoAnnonce as $trajet)
            <div class="card carsel thumbnail   item "itemscope="" itemtype="http://schema.org/CreativeWork" style="width:35rem;">
                <img class="card-img-top img img-responsive"  src="images/Bg-MonKoli.jpg" alt="Card image cap">
                <div class="card-body row">
                  <div class="col-4">
                    <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
                    <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
                    <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{$trajet['nomUser'].' '.$trajet['prenomUser']}}</h6>
                    <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
                  </div>
                  <div class="col-4">
                     <p class="" style="color: #00E38C;font-weight: bold;">{{$trajet['prixUnitaire']}}<sup style="color:black">Fcfa</sup><br>
                        <span style="color:black; font-size: x-small;">Par Kg</span>
                    </p>
                     <p style="color:black;font-size:x-small;">Lieu du dépot du colis à expédier <br>
                        <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{$trajet['lieuDepot']}}</span>
                    </p>
                    <p style="color:black;font-size:x-small;">Lieu de récupération du colis à expédier <br>
                        <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{$trajet['lieuLivraison']}}</span>
                    </p>
                  </div>
                  <div class="col-4">
                    <p style="color: #00E38C;font-weight: bold;">{{$trajet['unite']}}<sup style="color:black">Kg</sup><br>
                       <span style="color:black; font-size: x-small;">Disponible(e)</span>
                   </p>
                    <p style="color:black;font-size:x-small;">Date limite de réservation <br>
                       <span style="font-size: xx-small;font-weight: bold;color:red;">{{$trajet['dateLimiteReservation']}}</span>
                       <span style="font-size: xx-small;font-weight: bold;color:red;">20:00 GMT</span>
                   </p>
                 </div>
                 <div class="row">
                        <div class="col-8">
                            <br class="d-block d-sm-block d-lg-none d-md-none">
                            <p style="font-size: x-small;">Mode de transport :</p>
                        </div>
                        <div class="col-4">
                            <span> <img class="img img-responsive"  style="height:40px;width: 40px;" src="images/Avion.png" alt="avion"></span>
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
            @endforeach

           </div>
         <div class="col-1 prev navnext d-none d-sm-none d-md-block d-lg-block ">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <br class="d-none d-sm-none d-md-inline d-lg-block">
             <i style="font-weight: bold;" class="fa fa-5x fa-angle-right fa-align-center" aria-hidden="true"></i>
         </div>
     </div>
     <!-- #owl-demo-2 -->

    @endif
    @if ($check == true)
    <p>
        Aucun trajet enregistrer pour le moment
    </p>
    @endif

  </div>
  <!-- .container -->




<!--
    <div class="card carsel " style="width:25rem;">
            <img class="card-img-top" src="images/Bg-MonKoli.jpg" alt="Card image cap">
            <div class="card-body row">
              <div class="col-4">
                <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
                <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
                <h6 style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">phineas kouadio</h6>
                <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
              </div>
              <div class="col-4">
                 <p style="color: #00E38C;font-weight: bold;">XXXX<sup style="color:black">Fcfa</sup><br>
                    <span style="color:black; font-size: x-small;">Par Kg</span>
                </p>
                 <p style="color:black;font-size:x-small;">Lieu du dépot du colis à expédier <br>
                    <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">Imeuble, koumassi cytidia</span>
                </p>
                <p style="color:black;font-size:x-small;">Lieu de récupération du colis à expédier <br>
                    <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">Paris, koumassi cytidia</span>
                </p>
                <p style="font-size: x-small;">Mode de transport : </p>
              </div>
              <div class="col-4">
                <p style="color: #00E38C;font-weight: bold;">XXXX<sup style="color:black">Kg</sup><br>
                   <span style="color:black; font-size: x-small;">Disponible(e)</span>
               </p>
                <p style="color:black;font-size:x-small;">Date limite de réservation <br>
                   <span style="font-size: xx-small;font-weight: bold;color:red;">30/12/2020</span>
                   <span style="font-size: xx-small;font-weight: bold;color:red;">20:00 GMT</span>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <img  style="height: 40px;" src="images/Avion.png" alt="avion">
               </p>
             </div>
             <button type="button" class="btn pure-material-button-contained offset-3" style="background-color:#3C3C3C; margin-right:4px;"> <i style="color: black;" class="fa fa-share-alt " aria-hidden="true"></i> Partager l'annonce</button>
             <button type="button" class="btn vert pure-material-button-contained"> <i style="color: black;" class="fa fa-calendar " aria-hidden="true"></i> Réserver</button>

            </div>
          </div>
        </div>
-->
