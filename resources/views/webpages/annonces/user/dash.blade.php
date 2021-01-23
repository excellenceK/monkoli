<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MonKoli - Dashboard</title>
	<link href="{{ asset('css-dash/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/styles.css') }}" rel="stylesheet">
	  <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
      <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/index.css">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container main">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-weight: bolder;">Mon Espace</h1>
			</div>
		</div><!--/.row-->

		<section class="container-fluid" >
           <div class="row ">
			<div class="panel panel-container" style="box-shadow: 0 0px 26px 5px #C6C2C2; padding-top: 7px;">
				<div class="row center-block">
					<div class="col-6  col-md-6 col-lg-3 col-sm-6 no-padding" style="">
						<div class="panel panel-teal panel-widget"><a href="#">
							<div class="row no-padding"><i class="fas fa-chart-pie" style="font-size: 35px;"></i>
								<div class="text-muted" style="font-size: 10px;"><br/>Tableau de bord</div>
							</div>
						</a>
						</div>
					</div>
					<div class="col-6  col-md-6 col-lg-2 col-sm-6 no-padding">
						<div class="panel panel-teal panel-widget"><a href="#">
							<div class="row no-padding"><i class="fas fa-shopping-bag" style="font-size: 35px;"></i>
								<div class="text-muted" style="font-size: 10px;"><br/>Colis</div>
							</div>
						</a>
						</div>
					</div>
					<div class="col-6  col-md-6 col-lg-2 col-sm-6 no-padding">
						<div class="panel panel-teal panel-widget"><a href="#">
							<div class="row no-padding"><i class="fas fa-home" style="font-size: 35px;"></i>
								<div class="text-muted" style="font-size: 10px;"><br/>Résidences</div>
							</div>
						</a>
						</div>
					</div>
					<div class="col-6  col-md-6 col-lg-2 col-sm-6 no-padding">
						<div class="panel panel-teal panel-widget "><a href="#">
							<div class="row no-padding"><i class="fas fa-car" style="font-size: 35px;"></i>
								<div class="text-muted" style="font-size: 10px;"><br/>Véhicules</div>
							</div>
						</a>
						</div>
					</div>
					<div class="col-6  col-md-6 col-lg-3 col-sm-6 no-padding">
						<div class="panel panel-teal panel-widget"><a href="#">
							<div class="row no-padding"><i class="fas fa-user" style="font-size: 35px;"></i>
								<div class="text-muted" style="font-size: 10px;"><br/>Mes infos personnelles</div>
							</div>
						</a>
						</div>
					</div>
				</div><!--/.row-->
			</div>
		   </div>
		</section>
        <br><br>
        @php
            $annonceColi = DB::table('annonces')
                        ->where('user_id', Auth::user()->id)
                        ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                        ->whereDate('dateExpiration', '>', \Carbon\Carbon::now())
                        ->select('annonces.id as idAnnonce', 'annonces.*', 'transport_colis.*')
                        ->get();
            $annonceColiTotal = DB::table('annonces')
                        ->where('user_id', Auth::user()->id)
                        ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                        //->whereDate('dateExpiration', '>', \Carbon\Carbon::now())
                        ->select('annonces.id as idAnnonce', 'annonces.*', 'transport_colis.*')
                        ->get();
            $totalColis = $annonceColiTotal->count();
            //dd($totalColis);
            $annonceVehicule = DB::table('annonces')
                        ->where('user_id', Auth::user()->id)
                        //->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                        ->join('location_vehicules', 'location_vehicules.annonce_id', 'annonces.id')
                        //->join('location_appartements', 'location_appartements.annonce_id', 'annonces.id')
                        ->select('annonces.id as idAnnonce', 'annonces.*', 'location_vehicules.*')
                        ->get();
            $annonceMaison = DB::table('annonces')
                        ->where('user_id', Auth::user()->id)
                       // ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                       // ->join('location_vehicules', 'location_vehicules.annonce_id', 'annonces.id')
                        ->join('location_appartements', 'location_appartements.annonce_id', 'annonces.id')
                        ->select('annonces.id as idAnnonce', 'annonces.*', 'location_appartements.*')
                        ->get();


            //dd($annonceColi);
            //Compte Reservation
            $reservationsColi = 0;
            foreach ($annonceColi as  $value) {
                # code...
                $reservationsColi += DB::table('reservations')->where('annonce_id', $value->idAnnonce)->count();

            }
            $annonceEnCours = $annonceColi->count();
            //dd($reservations);

        @endphp
		<section class="container">
			<div class="panel panel-container" style="box-shadow: 0 0px 26px 5px #C6C2C2; padding-top: 20px">
				<div class="row">
					<div class="col-6 col-md-3 col-lg-3 col-sm-6 no-padding" style="background-color: none;">
						<div class="panel panel-teal panel-widget border-right">
							<div class="row no-padding">
								<div class="text-muted" style="font-size: 15px;">Annonce(s) en cours<br/></div>
								<div class="large" style="color: #00E38C;">{{ $annonceEnCours }}</div>
								<button type="button" class="btn pure2 offset-lg-2 offset-md-2" style=" font-size:small;background-color: #00E38C; color: white; width: 160px; height: 40px"> <i style="color: white; opacity: 0.7;" class="fas fa-eye" aria-hidden="true"></i>  Consultez les</button>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3 col-lg-3 col-sm-6 no-padding" style="background-color: none;">
						<div class="panel panel-teal panel-widget border-right">
							<div class="row no-padding">
								<div class="text-muted" style="font-size: 15px;">Reservation(s) en attente<br/></div>
								<div class="large" style="color: #00E38C;">{{ $reservationsColi }}</div>
								<button type="button" class="btn pure2 offset-lg-2 offset-md-2" style=" font-size:small;background-color: #00E38C; color: white; width: 160px; height: 40px";> <i style="color: white; opacity: 0.7;" class="fas fa-eye" aria-hidden="true"></i>  Consultez les</button>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3 col-lg-3 col-sm-6 no-padding" style="background-color: none;">
						<div class="panel panel-teal panel-widget border-right">
							<div class="row no-padding">
								<div class="text-muted" style="font-size: 15px;">Total Annonces<br/></div>
								<div class="large" style="color: #00E38C;">{{ $totalColis }}</div>
								<button type="button" class="btn pure2 offset-lg-2 offset-md-2" style="font-size:small; background-color: #00E38C; color: white; width: 160px; height: 40px";><i style="color: white; opacity: 0.7;" class="fas fa-eye" aria-hidden="true"></i>  Consultez les</button>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-3 col-lg-3 col-sm-6 no-padding" style="background-color: none;">
						<div class="panel panel-teal panel-widget">
							<div class="row no-padding">
								<div class="text-muted " style="font-size: 15px;">Notes Globale<br/><br/></div>
								<i class="fa fa-star valide"  aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star valide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star valide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star valide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star novalide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i>
							</div>
						</div>
					</div>
				</div><!--/.row-->
			</div>

		</section>

		<div class="row">
			<div class="col-sm-6">
				<h1 class="page-header" style="font-weight: bolder;">Colis</h1>
				<h3 class="page-header" style="font-weight: bold;">Réservations / trajet</h3>
				<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
					<div class="panel-body">
                        @foreach($annonceColiTotal as $value)
                            @php
                                $reservations = DB::table('reservations')->where('annonce_id', $value->idAnnonce)->get();
                                $quantiteReserve = 0;
                                $totalGain = 0;
                                $pourcentageReservation = 0;
                                foreach ($reservations as $data) {
                                    # code...
                                    $quantiteReserve += $data->quantiteReserve;
                                    $totalGain += $data->montantReservation;
                                }
                                $pourcentageReservation = ($quantiteReserve * 100)/$value->quantiteDisponible;
                                //dd($reservation);
                            @endphp
                            <div class="row progress-labels">
                                <div class="col-sm-6"><span>{{ $value->villeDepart }} </span><i class="fas fa-arrow-right"></i><span> {{ $value->villeArriver }}</span><br><br></div>
                                <div class="col-sm-6" style="text-align: right;">{{ $pourcentageReservation }}%</div>
                            </div>
                            <div class="progress">
                                <div data-percentage="0%" style="width: {{ $pourcentageReservation }}%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach



					<!--	<div class="row progress-labels">
							<div class="col-sm-6"><span>Abidjan </span><i class="fas fa-arrow-right"></i><span> Dakar</span><br><br></div>
							<div class="col-sm-6" style="text-align: right;">25%</div>
						</div>
						<div class="progress">
							<div data-percentage="0%" style="width: 25%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="row progress-labels">
							<div class="col-sm-6"><span>Abidjan </span><i class="fas fa-arrow-right"></i><span> Londres</span><br><br></div>
							<div class="col-sm-6" style="text-align: right;">25%</div>
						</div>
						<div class="progress">
							<div data-percentage="0%" style="width: 25%;" class="progress-bar progress-bar-teal" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="row progress-labels">
							<div class="col-sm-6"><span>Abidjan </span><i class="fas fa-arrow-right"></i><span> Yamoussoukro</span><br><br></div>
							<div class="col-sm-6" style="text-align: right;">25%</div>
						</div>
						<div class="progress">
							<div data-percentage="0%" style="width: 25%;" class="progress-bar" style="color: #00E38C" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
						</div>-->
					</div>

				</div>
			</div>
			<div class="col-sm-6">
				<h1 class="page-header" style="font-weight: bold; opacity: 0">Nothing</h1>
				<h3 class="page-header" style="font-weight: bold;">Total Gain</h3>
				<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
					<div class="panel-body">
						<div class="large" style="color: #00E38C; font-weight: bolder; font-size: 50px;">{{ $totalGain?? 00 }} <span style="color: #C6C2C2; font-weight: 500;">FCFA</span>
                            <br><br>

                            @foreach($annonceColiTotal as $value)
                                @php
                                    $reservations = DB::table('reservations')->where('annonce_id', $value->idAnnonce)->get();
                                    $totalParTrajet = 0;
                                    foreach ($reservations as $data) {
                                        # code...
                                        $totalParTrajet += $data->montantReservation;
                                    }
                                //dd($reservation);
                                @endphp
                                <div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
                                    <div class="panel panel-teal panel-widget border-right">
                                        <div class="row no-padding">
                                            <div class="text-muted" style="font-size: 7px; color: #3C3C3C"><span>{{ $value->villeDepart }} </span><i class="fas fa-arrow-right" style="font-size: 9px;"></i><span> {{ $value->villeArriver }}</span><br/><br></div>
                                            <div class="text-muted" style="font-size: 15px; color: #00E38C">{{ $totalParTrajet }}<br/></div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

							<!--<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 7px; color: #3C3C3C"><span>Abidjan </span><i class="fas fa-arrow-right" style="font-size: 9px;"></i><span> Dakar</span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 7px; color: #3C3C3C"><span>Abidjan </span><i class="fas fa-arrow-right" style="font-size: 9px;"></i><span> Londres</span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 7px; color: #3C3C3C"><span>Abidjan </span><i class="fas fa-arrow-right" style="font-size: 9px;"></i><span> Yamoussoukro</span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>


		</div><!--/.row-->


		<!--<div class="row">
			<div class="col-sm-6">
				<h1 class="page-header" style="font-weight: bolder;">Résidences</h1>
				<h3 class="page-header" style="font-weight: bold;">Chiffres</h3>
				<div class="row">
					<div class="col-md-16">
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="panel-heading">
								<ul class="pull-right">

								</ul>
								<span class="pull-right"></em></span></div>
							<div class="panel-body">
								<div class="canvas-wrapper">
									<canvas class="chart" id="pie-chart" ></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<h1 class="page-header" style="font-weight: bold; opacity: 0">Nothing</h1>
				<h3 class="page-header" style="font-weight: bold;">Total Gain</h3>
				<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
					<div class="panel-body">
						<div class="large" style="color: #00E38C; font-weight: bolder; font-size: 50px;">300 000 <span style="color: #C6C2C2; font-weight: 500;">FCFA</span>
							<br><br>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Riviera 3 </span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Marcory  </span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Plateau </span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="background-color: none;">
								<div class="panel panel-teal panel-widget border-right">
									<div class="row no-padding">
										<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Angré </span><br/><br></div>
										<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --><!--/.row-->

	</div>

	<script src="{{ asset('js-dash/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js-dash/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js-dash/chart.min.js') }}"></script>
	<script src="{{ asset('js-dash/chart-data.js') }}"></script>
	<script src="{{ asset('js-dash/easypiechart.js') }}"></script>
	<script src="{{ asset('js-dash/easypiechart-data.js') }}"></script>
	<script src="{{ asset('js-dash/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js-dash/custom.js') }}"></script>
	<script>
	window.onload = function () {
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {
	responsive: true,
	segmentShowStroke: false
	});
};
	</script>
</body>
</html>
