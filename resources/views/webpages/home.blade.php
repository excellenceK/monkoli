
@php
    //$today = \Carbon\Carbon::now()->format('Y-m-d');
    //$today =  $today.' 00:00:00';
    //dd($today);
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
        where transport_colis.annonce_id = annonces.id and annonces.user_id = users.id and annonces.dateExpiration >= (select NOW())
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
    $quantiteReservee = 0;
    foreach ($resultQueryGetInfoAnnonce as $value) {
        # code...idAnnonce
        $quantiteReservee = DB::table('reservations')->where('annonce_id', $value->idAnnonce)->sum('quantiteReserve');
        //dd($quantiteReservee);
    }
    //$disponible = $resultQueryGetInfoAnnonce - $quantiteReservee;
    //dd($resultQueryGetInfoAnnonce);
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
                <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                    @csrf
                    <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                    <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                    <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                    <button type="submit" class="offset-lg-4 btn gris pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Voir Annonces</button>
                    <a style="text-decoration: none;" href="{{ route('createAnnonce') }}"><button  type="button" class="btn  vert  pure-material-button-contained d-none d-sm-none d-lg-inline d-md-none"> <i class="fa fa-plus"></i> Publier une annonce en moins de 30 s</button></a>
                    <br class="d-block d-sm-block d-lg-none d-md-block">
                    <br class="d-block d-sm-block d-lg-none d-md-block">
                    <a style="text-decoration: none;" href="{{ route('createAnnonce') }}"><div class=" d-block d-sm-block d-lg-none d-md-block" ><button type="button" class="btn  vert  pure-material-button-contained"> <i class="fa fa-plus"></i> Publier Annonce </button></div></a>
                </form>
            </div>

        </div>

    </section>
    <!--End two button-->
    <br/>
    <!--Categories section-->
    <section class="container-fluid " style="padding-left: 0;">
        <div class="row" >
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 side1">
                <img class="img img-responsive" src="images/Bg-MonKoli.jpg" alt="side1" srcset="">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 side2">
                    <h2>Catégories</h2>
                    <span style="font-size: 0.9rem; color: #A7A7A7">Monkoli vous aide à expédier votre colis selon le canal de distribution souhaité:</span>
                    <div class="row">
                        <div class="col"><img src="images/Avion.png"><br/>
                                Avion
                        </div>
                        <div class="col"><img src="images/Bateau.png"><br/>
                            Bateau
                        </div>
                        <div class="col"><img src="images/Train.png"><br/>
                            Train
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><img src="images/Camion.png"><br/>
                                Camion
                        </div>
                        <div class="col"><img src="images/Poids-lourd.png"><br/>
                            Poids lourd
                        </div>
                        <div class="col"><img src="images/Camionette.png"><br/>
                            Camionette
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><img src="images/Voiture.png"><br/>
                                Voiture
                        </div>
                        <div class="col"><img src="images/Moto.png"><br/>
                            Moto
                        </div>
                        <div class="col"><img src="images/Velo.png"><br/>
                            Velo
                        </div>
                    </div>
                    <br/>
                    <!--
                    <div class="row" style="padding: 2px; margin: 0;">
                        <h3 class="col-12">Location de résidences</h3>
                        <p class="col-12" style="font-size: small; font-size: 0.9rem; color: #A7A7A7">Besoin d'un appartement selon votre besoin?</p>
                        <span class="col-12" ><button type="button" class="btn vert pure-material-button-contained new"> <i class="fa fa-search" aria-hidden="true"></i> Voir Annonces</button></span>
                    </div>
                    <br/>
                    <div class="row" style="padding: 2px; margin: 0;">
                        <h3 class="col-12">Location de voiture</h3>
                        <p class="col-12" style="font-size: small; font-size: 0.9rem; color: #A7A7A7">Besoin d'un véhicule pour vos courses?</p>
                        <span class="col-12" ><button type="button" class="btn vert pure-material-button-contained new"> <i class="fa fa-search" aria-hidden="true"></i> Voir Annonces</button></span>
                    </div>
                -->
            </div>

        </div>
    </section>
    <!--End Categories section-->
   <br/> <br> <br><br> <br> <br>
   <section style="height:auto">
    <section class="container-fluid search">
        <div class="row ">
            <div class="col-12 col-md-12 col-sm-12 col-lg-12" style="padding:2px;">
               <h1 id="searhHeading">Expédier votre colis n'a jamais été aussi  simple!<img src="images/logo.png"  class="searchlogo  img img-responsive" alt="logo"/></h1>
               <h5 style="color: #FFF">  Recherchez et trouver le transporteur <span style="color:#079860;">idéal</span> au moment <span style="color:#079860;">opportun.</span></h5>
               <h3 style="color: #079860;">Facile<span style="color:white;">,</span> Rapide<span style="color:white;"> et</span> Fiable</h3>
            </div>
        </div>
        <br/>
        <br/>
        <div class="row">
         <span class="col-12">
             <form class="form col-12 col-md-12 col-lg-12 col-sm-12" method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
               @csrf
                <div class="row">
                  <div class="col-12 col-md-4 col-lg-4 col-sm-12">
                         <input type="text" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                         <span class="fa fa-sort-down fa-lg icon"></span>
                   </div>
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <div class="col-12 col-md-3 col-lg-3 col-sm-12">
                     <input type="text" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                     <span class="fa fa-sort-down fa-lg icon"></span>
                   </div>
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <div class="col-12 col-md-3 col-lg-3 col-sm-12">
                     <input type="date" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                   </div>
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <br class="d-block d-sm-block d-lg-none d-md-block">
                   <span class="col-12 col-md-2 col-lg-2 col-sm-12" ><button type="submit" class="btn vert pure-material-button-contained"> <i class="fa fa-search" aria-hidden="true"></i> Trouver</button></span>
                </div>
             </form>
         </span>
        </div>
        <br/>
        <h6 style="color: #FFF">Gagnez de l'argent en transportant des colis.<a href="{{ route('createAnnonce') }}"><span style="color:#079860; text-decoration: underline;"> Poster une annonce</span></a></h6>
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
        <div class="col-lg-2 col-6 col-sm-6 col-md-6 ">
         <button type="button" class="btn vert pure-material-button-contained">
            @php
                $moyenTransport = strtolower('voiture personnelle') ;
                $count =  DB::select('select count(annonces.id) as nombre
                    FROM annonces, transport_colis, users
                    WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                    ');
            @endphp
            Tout({{ $count[0]->nombre }})

            </button>
        </div>
        <div class="col-lg-2 col-6 col-sm-6 col-md-6 " >
            <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                @csrf
                <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                <input type="hidden" class="form-control col-12" name = "moyenTransport" value="avion">

                <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-plane" aria-hidden="true"></i>

                @php
                    $moyenTransport = strtolower('avion') ;
                    $count =  DB::select('select count(annonces.id) as nombre
                        FROM annonces, transport_colis, users
                        WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                        and transport_colis.moyenTransport = ?', [$moyenTransport]);
                @endphp
                Avion({{ $count[0]->nombre }})

            </button>
        </form>
        </div>
        <br class="d-block d-sm-block d-lg-none d-md-block">
        <br class="d-block d-sm-block d-lg-none d-md-block">

        <div class="col-lg-2 col-6 col-sm-6 col-md-6 " >
            <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                @csrf
                <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                <input type="hidden" class="form-control col-12" name = "moyenTransport" value="bateau">

                <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-ship" aria-hidden="true"></i>

                @php
                    $moyenTransport = strtolower('bateau') ;
                    $count =  DB::select('select count(annonces.id) as nombre
                        FROM annonces, transport_colis, users
                        WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                        and transport_colis.moyenTransport = ?', [$moyenTransport]);
                @endphp
                Bateau({{ $count[0]->nombre }})

            </button>
        </form>
        </div>
        <div class="col-lg-2 col-6 col-sm-6 col-md-6 ">
            <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                @csrf
                <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                <input type="hidden" class="form-control col-12" name = "moyenTransport" value="train">

                <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-train" aria-hidden="true"></i>

                @php
                    $moyenTransport = strtolower('train') ;
                    $count =  DB::select('select count(annonces.id) as nombre
                        FROM annonces, transport_colis, users
                        WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                        and transport_colis.moyenTransport = ?', [$moyenTransport]);
                @endphp
                Train({{ $count[0]->nombre }})

            </button>
        </form>
        </div>
        <br class="d-block d-sm-block d-lg-none d-md-block">
        <br class="d-block d-sm-block d-lg-none d-md-block">

        <div class="col-lg-2 col-6 col-sm-6 col-md-6 ">
            <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                @csrf
                <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                <input type="hidden" class="form-control col-12" name = "moyenTransport" value="camion">

                <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-truck" aria-hidden="true"></i>

                @php
                    $moyenTransport = strtolower('camion') ;
                    $count =  DB::select('select count(annonces.id) as nombre
                        FROM annonces, transport_colis, users
                        WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                        and transport_colis.moyenTransport = ?', [$moyenTransport]);
                @endphp
                Camion({{ $count[0]->nombre }})
                </button>
            </form>
        </div>
        <div class="col-lg-2 col-6 col-sm-6 col-md-6">
            <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                 @csrf
                 <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                 <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                 <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                 <input type="hidden" class="form-control col-12" name = "moyenTransport" value="poids lourd">

                 <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-ship" aria-hidden="true"></i>

                 @php
                     $moyenTransport = strtolower('Poids lourd') ;
                     $count =  DB::select('select count(annonces.id) as nombre
                         FROM annonces, transport_colis, users
                         WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                         and transport_colis.moyenTransport = ?', [$moyenTransport]);
                 @endphp
                 Poids lourd({{ $count[0]->nombre }})

                 </button>
             </form>
         </div>
        <br class="d-block d-sm-block d-lg-none d-md-block">
        <br class="d-block d-sm-block d-lg-none d-md-block">
        <div class="row" style="padding-top:5px">
            <div class="col-lg-4 col-6 col-sm-6 col-md-6">
                <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                    @csrf
                    <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                    <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                    <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                    <input type="hidden" class="form-control col-12" name = "moyenTransport" value="voiture personnelle">

                    <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-car-side" aria-hidden="true"></i>

                        @php
                            $moyenTransport = strtolower('voiture personnelle') ;
                            $count =  DB::select('select count(annonces.id) as nombre
                                FROM annonces, transport_colis, users
                                WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                                and transport_colis.moyenTransport = ?', [$moyenTransport]);
                        @endphp
                        Voiture({{ $count[0]->nombre }})
                    </button>
                </form>
               </div>
               <div class="col-lg-4 col-6 col-sm-6 col-md-6">
                <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                    @csrf
                    <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                    <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                    <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                    <input type="hidden" class="form-control col-12" name = "moyenTransport" value="moto">

                    <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-motorcycle" aria-hidden="true"></i>

                        @php
                            $moyenTransport = strtolower('Moto') ;
                            $count =  DB::select('select count(annonces.id) as nombre
                                FROM annonces, transport_colis, users
                                WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                                and transport_colis.moyenTransport = ?', [$moyenTransport]);
                        @endphp
                        Moto({{ $count[0]->nombre }})
                    </button>
                </form>
               </div>
               <br class="d-block d-sm-block d-lg-none d-md-block">
               <br class="d-block d-sm-block d-lg-none d-md-block">
               <div class="col-lg-4 col-12 col-sm-12 col-md-12">
                <form method="POST" action="{{ route('coli.rechercheAnnonceColi') }}">
                    @csrf
                    <input type="hidden" class="form-control col-12" name = "villeDepart" placeholder="D'où part le colis?">
                    <input type="hidden" class="form-control col-12" name = "villeArriver" placeholder="Où voulez vous l'expédier?">
                    <input type="hidden" class="form-control col-12" name = "dateRecherche" placeholder="Quand voulez vous l'envoyer?">
                    <input type="hidden" class="form-control col-12" name = "moyenTransport" value="camionette">

                    <button type="submit" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: white; opacity: 0.7;" class="fas fa-shipping-fast" aria-hidden="true"></i>

                        @php
                            $moyenTransport = strtolower('Camionette') ;
                            $count =  DB::select('select count(annonces.id) as nombre
                                FROM annonces, transport_colis, users
                                WHERE annonces.user_id = users.id and transport_colis.annonce_id = annonces.id and annonces.dateExpiration >= (select NOW())
                                and transport_colis.moyenTransport = ?', [$moyenTransport]);
                            @endphp
                            Camionette({{ $count[0]->nombre }})

                        </button>
                </form>
                </div>

        </div>
       <!--  <div class="col-6 col-sm-6 col-lg-1 col-md-4" style="padding-left: 80px;">
         <button type="button" class="btn  pure-material-button-contained" style="background-color:#C6C2C2;"> <i style="color: black;" class="fas fa-biking" aria-hidden="true"></i> Velo(13)</button>
        </div> -->
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
            <div class="row col-lg-11">
                @foreach ($getInfoAnnonce as $trajet)
                <div class="card  carsel thumbnail   item "itemscope="" itemtype="http://schema.org/CreativeWork">
                    <img class="card-img-top img img-responsive d-none d-md-none d-lg-block"  src="../images/bg_card.png" alt="Card image cap" style="margin-top: -19px;">
                    <img class="card-img-top img img-responsive d-block d-md-block d-lg-none"  src="../images/bg_card.png" alt="Card image cap">
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
            </div>


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
    <br>
    <br>
  </div>
  <!-- .container -->

  <div id="fb-root"></div>
  <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
  </script>


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
