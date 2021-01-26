<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>MonKoli - Reservation </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{{ asset('js-css-reservation/css/themify-icons.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/datepicker3.css') }}" rel="stylesheet">
	  <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
      <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
    <link href="{{ asset('js-css-reservation/css/paper-bootstrap-wizard.css') }}" rel="stylesheet" />
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

	<body>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand indexlogo" href="#">
                <img src="{{ asset('images/logo.png') }}"  class="d-inline-block align-top img img-responsive" alt="logo"/>
                </a>
                <ul class="nav navbar-top-links navbar-left">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav" style="margin-top: 10px; margin-left: 200px;" id="itm">
                        <a id="1" class="nav-item nav-link ah" href="#">
                            <div class="menu">
                                 <p>Colis</p>
                                <i class="fas fa-shopping-bag fa-align-center fa-2x" aria-hidden="true"></i>
                                <hr/>
                            </div>
                       </a>
                       <a  id="2"  class="nav-item nav-link  ah" href="#">
                        <div class="menu">
                             <p>Mes annonces</p>
                            <i class="fas fa-bullhorn fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                       </a>
                       <a id="3"  class="nav-item nav-link ah " href="#">
                        <div class="menu">
                             <p>Messages</p>
                            <i class="fas fa-comments fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                      <a  id="4"  class="nav-item nav-link ah " href="page/posterAnnonce1.html">
                        <div class="menu poste">
                             <p>Poster une annonce</p>
                            <i class="fas fa-plus-circle fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                      <a id="5"  class="nav-item nav-link ah" href="#">
                        <div class="menu">
                             <p>Mon espace</p>
                            <i class="fas fa-user fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                      <a id="6"  class="nav-item nav-link ah" href="#">
                        <div class="menu">
                             <p>Résidence</p>
                            <i class="fas fa-home fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                      <a id="7"  class="nav-item nav-link ah" href="#">
                        <div class="menu">
                             <p>Véhicules</p>
                            <i class="fas fa-car fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                      <div class="menu">
                        <button type="button" class="btn gris pure-material-button-contained logon">Inscription</button>
                        <button type="button" class="btn vert pure-material-button-contained logon1">Connexion</button>
                      </div>
                    </div>
                </div>
            </ul>

            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <!--mobile header-->
    <header id="hmobile" class="container-fluid d-block d-sm-block d-lg-none d-md-block" >
        <div id="mobileMenu" style="display: none;">
            <i id="close" class="fa fa-3x fa-window-close" style="color: white" aria-hidden="true"></i>
            <ul class="menuList">
                <li>
                    <a class="nav-item nav-link am" href="#">
                        <div class="menu">
                             <p>Colis</p>
                            <i class="fa fa-shopping-bag fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                   </a>
                </li>
                <li>
                    <a class="nav-item nav-link am" href="#">
                        <div class="menu">
                             <p>Mes annonces</p>
                            <i class="fa fa-bullhorn fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                       </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Messages</p>
                            <i class="fa fa-comments fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu poste">
                             <p>Ajouter annonce</p>
                            <i class="fa fa-plus-circle  fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Mon espace</p>
                            <i class="fa fa-users fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Résidence</p>
                            <i class="fa fa-home fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Véhicules</p>
                            <i class="fa fa-car fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <button type="button" class="btn gris pure-material-button-contained">Inscription</button>

                </li>
                <li>
                    <button type="button" class="btn vert pure-material-button-contained">Connexion</button>

                </li>

            </ul>
        </div>
    </header>

  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-12  col-lg-12 col-md-12">
        <h1 class="page-header" style="font-weight: bolder;">Reservation</h1>
      </div>
    </div><!--/.row-->

     <div class="row">
          <div class=>
            <div class="col-12 col-lg-12 col-md-12" style="width:100%">
                <!--Wizard container -->
                <div class="wizard-container">
                    <div class=" row card wizard-card" data-color="green" id="wizardProfile" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
                        <form action="{{ route('coli.reservationColiPost') }}" method="post">
                            @csrf
                            <div class=" wizard-navigation">
                                <div class=" col-12 progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li class="col-4">
                                        <a href="#info" data-toggle="tab"><div class="icon-circle"><i class="ti-pencil"></i></div>Infos de réservation</a>
                                    </li>
                                    <li class="col-4">
                                        <a href="#waitConfirm" data-toggle="tab"><div class="icon-circle"><i class="ti-check-box"></i></div>Attente de Confirmation</a>
                                    </li>
                                    <li class="col-4">
                                        <a href="#end" data-toggle="tab"><div class="icon-circle"><i class="ti-check"></i></div>Terminer</a>
                                    </li>
                                </ul>
                           </div>
                   <br>
                   <br>
                <div class="tab-content">
                    <div class="tab-pane" id="info">
                      <div class="row">
                          <h6 class="info-text" style="color: #A7A7A7;"> Entrez la quantité souhaitée que vous voulez reserver et cliquer sur "Reserver" pour continuer.</h6>
                        <br>
                        @php
                            $transporteur = DB::table('users')->where('id',$annonce->user_id)->first();
                            $reservation = DB::table('reservations')->where('annonce_id', $annonce->id)->get();
                            $quantiteReserve = 0;
                            foreach ($reservation as  $value) {
                                # code...
                                $quantiteReserve += $value->quantiteReserve;

                            }
                            $disponible = $annonce->quantiteDisponible -  $quantiteReserve;
                        @endphp
                        <div class="col-sm-10 ">
                          <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                            <i class="fa fa-user-circle fa-7x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
                            <br><br>
                            <h5 style="font-weight: bold;">Transporteur</h5>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">{{ $transporteur->name.' '.$transporteur->prenom }}</h6>
                            <br>
                            <i class="fa fa-star valide"  aria-hidden="true"></i>&nbsp;<i class="fa fa-star valide" aria-hidden="true"></i>&nbsp;<i class="fa fa-star valide" aria-hidden="true"></i>&nbsp;<i class="fa fa-star valide" aria-hidden="true"></i>&nbsp;<i class="fa fa-star novalide" aria-hidden="true"></i>
                            <br><br>
                           <!-- <h5 style="font-weight: bold;">Téléphone</h5>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">+225 07 77 44 30 25</h6>
                            <br>
                            <h5 style="font-weight: bold;">Email</h5>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">monkoli@monkoli.com</h6>-->
                          </div>
                          <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                            <h4 style="font-weight: bold;">{{ $annonce->villeDepart }}</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">Côte d'Ivoire</h6>
                            <br>
                            <h5 style="font-weight: bold;">Depart</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">{{ \Carbon\Carbon::parse($annonce->dateDepart)->format('d-m-Y')  }}</h6>
                            <br>
                            <h4 style="font-weight: bold; color: #00E38C;">{{ $annonce->prixUnitaire }} <span style="color:black">Fcfa</span><br></h4>
                            <h4 style="color:black; font-weight: bold;">Kg</h4>
                            <input type="hidden" id="prix" value=" {{ $annonce->prixUnitaire }} ">
                            <br>
                            <h5 style="font-weight: bold;">Lieu du dépot du colis</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">{{ $annonce->lieuDepot }}</h6>
                            <br>
                            <h5 style="font-weight: bold;">Lieu de livraison </h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">{{ $annonce->lieuLivraison }}</h6>
                            <br>
                            <h5 style="font-weight: bold;">Mode de tansport : </h4>
                            <br>
                          </div>
                          <div class="col-xs-6 col-md-3 col-lg-2 no-padding" style="height: 500px; min-height: 300px;">
                              <br>
                              <i class="ti-arrow-right" style="font-size: x-large;"></i>
                          </div>
                          <div class="col-4">
                            <h4 style="font-weight: bold;">{{ $annonce->villeArriver }}</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">France</h6>
                            <br>
                            <h5 style="font-weight: bold;">Arrivée</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">{{ \Carbon\Carbon::parse($annonce->dateArriver)->format('d-m-Y') }}</h6>
                            <br>
                            <h4 style="font-weight: bold; color: #00E38C;">{{ $disponible }} <span style="color:black">Kg</span><br></h4>
                            <h4 style="color:black; font-weight: bold;">Disponible(s)</h4>
                            <br>
                            <h5 style="font-weight: bold;">Date limite de réservation </h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: red;"><span >{{ \Carbon\Carbon::parse($annonce->dateLimiteReservation)->format('d-m-Y') }}</span>
                               <span>{{ \Carbon\Carbon::parse($annonce->dateLimiteReservation)->format('H:i') }} GMT</span></h6>
                            <br>
                           <!-- <h5 style="font-weight: bold;">Lieu du dépot du colis</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">Immeuble, koumassi cytidia</h6>-->
                            <br><br>
                            <span> <img class="img img-responsive" style="height:70px;width: 70px; margin-top: -12px" src="{{ asset('images/Avion.png') }}" alt="avion"></span>
                            <br><br>
                         </div>
                         <div class="col-4">
                            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}" >

                         </div>

                      </div>
                      <div class="col-xs-6 col-md-3 col-lg-1 no-padding">
                        <div class="form-group">
                          <div class="wrap-input100 validate-input" style="width: 190px">
                            <label style="color: #3C3C3C">Qunantité souhaitée <small style="color: red">(*)</small></label>
                            <input class="input100 form-control" id="quantite" type="number" name="quantite" onchange="calculatePrice()" placeholder="0" min="{{ $annonce->minimunReservation }}" max="{{ $disponible }}" required><span style="float: right; margin-top: -30px; margin-right: -40px; font-size: large;"> Kg</span>
                            <span class="focus-input100"></span>
                          </div> <br>
                          <div class="wrap-input100 validate-input" style="width: 180px">
                            <input type="checkbox" id="scales" name="fragile">
                            <label  for="scales">Fragile</label>
                            <input type="checkbox" id="scale" name="fragile">
                            <label  for="scale"> Liquide</label> <br>
                            <input type="checkbox" id="scale" name="fragile">
                            <label  for="scale"> Réfrigéré</label> <br>
                            <input type="checkbox" id="scale" name="fragile">
                            <label  for="scale"> Objet de plus de 1m20</label>
                            <span class="focus-input100"></span>
                          </div>
                          <br/>
                          <br/>
                          <div class="wrap-input100 validate-input" style="width: 180px">
                            <label style="color: #3C3C3C">Total</label>
                                <input id="total" class="input100 form-control" type="text" name="total"  readonly style="font-size: 25px;"><span style="float: right; margin-top: -30px; margin-right: -60px; font-size: large;"> FCFA</span>
                            <span class="focus-input100"></span>
                          </div>

                        </div>
                      </div>
                    </div>

                    </div>
                    <div class="tab-pane" id="waitConfirm">
                        <h5 class="info-text" style="color: #3C3C3C;"><span><i class="ti-info-alt" style="font-size: 14px;"></i> Votre réservation sera mise en attente de confirmation par le transporteur.</span></h5>
                        <div class="row">
                          <div class="col-lg-6 ">
                            <div class="col-xs-6 col-lg-12 no-padding">
                              <div class="card  thumbnail col-12 col-md-12 col-sm-8 col-lg-4" itemscope="" itemtype="http://schema.org/CreativeWork" style="width:auto; padding-left: 0px; padding-right: 0px;">
                                <img class="card-img-top img img-responsive"  src="{{ asset('images/bg_card.png') }}" alt="Card image cap">
                                <div class="card-body row">
                                  <br>
                                  <div class="col-sm-3" style="margin-left: 20px;">
                                    <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
                                    <br>
                                    <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
                                    <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ $transporteur->name.' '.$transporteur->prenom }}</h6>
                                    <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-4">
                                     <p class="" style="color: #00E38C;font-weight: bold;">{{ $annonce->prixUnitaire }}<sup style="color:black">Fcfa</sup><br>
                                        <span style="color:black; font-size: x-small;">Par Kg</span>
                                    </p>
                                    <br>
                                     <p style="color:black;font-size:x-small;">Lieu du dépot du colis <br>
                                        <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ $annonce->lieuDepot }}</span>
                                    </p>
                                    <br>
                                    <p style="color:black;font-size:x-small;">Lieu de livraison <br>
                                        <span style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ $annonce->lieuLivraison }}</span>
                                    </p>
                                    <br class="d-block d-sm-block d-lg-none d-md-none">
                                    <p style="font-size: x-small;">Mode de transport :</p>
                                  </div>
                                  <div class="col-sm-4">
                                    <p style="color: #00E38C;font-weight: bold;">{{ $disponible }}<sup style="color:black">Kg</sup><br>
                                       <span style="color:black; font-size: x-small;">Disponible(e)</span>
                                   </p>
                                   <br>
                                    <p style="color:black;font-size:x-small;">Date limite de réservation <br>
                                       <span style="font-size: xx-small;font-weight: bold;color:red;">{{ \Carbon\Carbon::parse($annonce->dateLimiteReservation)->format('d-m-Y') }}</span>
                                       <span style="font-size: xx-small;font-weight: bold;color:red;">{{ \Carbon\Carbon::parse($annonce->dateLimiteReservation)->format('H:i') }} GMT</span>
                                       <br><br><br><br><br><br><br><br>
                                       <span> <img class="img img-responsive"  style="height:40px;width: 40px;" src="{{ asset('images/Avion.png') }}" alt="avion"></span>
                                   </p>
                                 </div>

                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-2" style="margin-top: 50px">
                            <!--<h4 style="font-weight: bold;">Téléphone</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">+225 07 77 44 30 25</h6>
                            <br>
                            <h4 style="font-weight: bold;">Email</h4>
                            <h6 class="text-truncate" style="font-weight: bold;color: #C6C2C2;">monkoli@monkoli.com</h6>
                            <br>-->
                            <h4 style="font-weight: bold;">Qté souhaitée</h4>
                            <h5 style="font-weight: bold; color: #00E38C;"><input id="quantiteS" type="text" style="width: 40px"> <span style="color:black">Kg</span><br></h5>
                            <br>
                            <h4 style="font-weight: bold;">Total à payer</h4>
                            <h5 style="font-weight: bold; color: #00E38C;"><input type="text"  id="montant" style="width: 60px"> <span style="color:black">FCFA</span><br></h5>
                            <br>

                         </div>
                         <div class="col-sm-1">
                            <hr style="width:1px; height:270px; margin-top: 50px; background-color: #C6C2C2"/>
                            <br><br>

                         </div>
                         <div class="col-3" style="padding-top: 100px;">

                            <h6 class="text-truncate" style="color: #A7A7A7; text-align: center; line-height: 1.5;">Votre réservation sera transmise à l'annonceur pour validation. Le Transporteur après validation de votre reservation<br> vous contactera pour confirmation et prise<br> de rendez-vous pour le dépôt du colis<br> à expédier.<br><br> Merci de faire confiance à MonKoli<br> pour expédier vos colis.</h6>
                            <br><br>

                         </div>

                        </div>
                      </div>


                    <div class="tab-pane" id="end">
                        <div class="row">
                            <div class="col-sm-12" style="height: 300px;">
                                <h2 class="info-text"> Cliquez sur Reserver pour envoyer votre reservation à l'annonceur.</h2>

                            </div>

                        </div>
                    </div>
                    <div class="wizard-footer">
                        <div class="pull-right">
                            <a href="{{ url('/') }}"><input type='button' class='btn btn-cancel btn-fill btn-warning btn-wd' name='previous' value='Annuler la réservation' style="background-color: red; border-color: red"/></a>
                            <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Reserver' />
                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Suivant' />


                        </div>

                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Retour' />
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </form>
        </div>
    </div> <!-- wizard container -->
</div>
</div><!-- end row -->
    </div> <!--  big container -->
</div>
  </div>

  <script>
      function calculatePrice() {
          var quantite = document.getElementById('quantite').value;
          var quantiteL = document.getElementById('quantiteS');
          var montant = document.getElementById('montant');


          var prix  = document.getElementById('prix').value;
          var total  = document.getElementById('total');
            total.value = quantite*prix;
            quantiteL.value = quantite;
            montant.value = quantite*prix;
        //alert();
      }
  </script>

    <script src="{{ asset('js-dash/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js-dash/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js-dash/chart.min.js') }}"></script>
	<script src="{{ asset('js-dash/chart-data.js') }}"></script>
	<script src="{{ asset('js-dash/easypiechart.js') }}"></script>
	<script src="{{ asset('js-dash/easypiechart-data.js') }}"></script>
	<script src="{{ asset('js-dash/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js-dash/custom.js') }}"></script>
	</body>
  <script src="{{ asset('js-css-reservation/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js-css-reservation/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js-css-reservation/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

  <!--  Plugin for the Wizard -->
  <script src="{{ asset('js-css-reservation/js/demo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js-css-reservation/js/reservation.js') }}" type="text/javascript"></script>

  <!--  More information about jquery.validate here: https://jqueryvalidation.org/   -->
  <script src="{{ asset('js-css-reservation/js/jquery.validate.min.js') }}" type="text/javascript"></script>

</html>
