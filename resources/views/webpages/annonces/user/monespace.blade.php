@extends('layouts.monespace')
@section('main')
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
                    $reservationsColi += DB::table('reservations')->where('annonce_id', $value->idAnnonce)->where('accepter', null)->count();

                }
                $annonceEnCours = $annonceColi->count();
                //dd($reservations);

            @endphp
		<div class="container panel panel-container" style="box-shadow: 0 0px 26px 5px #C6C2C2; padding-top: 20px">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-3" style="background-color: none;">
					<div class="panel panel-teal panel-widget border-right">
						<div class="no-padding justify-content-center">
							<p class="text-muted" style="font-size: 15px;">Annonce(s) en cours</p>
							<p class="large" style="color: #00E38C; text-align:center">{{ $annonceEnCours }}</p>
							<a href="{{ route('users.consulterAnnonce') }}" type="button" class="btn pure2" style="background-color: #00E38C; color: white; width: 18rem; height: 20px; font-size: 1.5rem;"> <i style="color: white; opacity: 0.7;" class="fas fa-eye" aria-hidden="true"></i>  Consultez les</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3" style="background-color: none;">
					<div class="panel panel-teal panel-widget border-right">
						<div class="no-padding justify-content-center">
							<p class="text-muted" style="font-size: 15px;">Reservation(s) en attente</p>
							<p class="large" style="color: #00E38C;">{{ $reservationsColi }}</p>
							<a href="{{ route('users.consulterAnnonce') }}" type="button" class="btn pure2 offset-lg-2 offset-md-2" style="background-color: #00E38C; color: white; width: 18rem; height: 20px; font-size: 1.5rem;"> <i style="color: white; opacity: 0.7;" class="fas fa-eye" aria-hidden="true"></i>  Consultez les</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3" style="background-color: none;">
					<div class="panel panel-teal panel-widget border-right">
						<div class="no-padding justify-content-center">
							<p class="text-muted" style="font-size: 15px;">Total Annonces</p>
							<p class="large" style="color: #00E38C;">{{ $totalColis }}</p>
							<a href="{{ route('users.mesTrajets') }}" type="button" class="btn pure2" style="background-color: #00E38C; color: white; width: 18rem; height: 20px; font-size: 1.5rem;"><i style="color: white; opacity: 0.7;" class="fas fa-eye" aria-hidden="true"></i>  Consultez les</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-3" style="background-color: none;">
					<div class="panel panel-teal panel-widget">
						<div class="no-padding justify-content-center">
							<p class="text-muted" style="font-size: 15px;">Notes Globale</p><br><br>
							<p><i class="fa fa-star valide"  aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star valide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star valide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star valide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i><i class="fa fa-star novalide" aria-hidden="true" style="color: #00E38C; margin-right: 7px"></i></p>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<div class="row">
			<div class="col-12 col-lg-6 col-md-12">
				<h1 class="page-header" style="font-weight: bolder;">Colis</h1>
				<h3 class="page-header" style="font-weight: bold;">Réservations / trajet</h3>
				<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
					<div class="panel-body">
                        @php
                            $quantiteReserve = 0;
                            $totalGain = 0;
                            $pourcentageReservation = 0;
                        @endphp
						@foreach($annonceColiTotal as $value)
                            @php

                                $reservations = DB::table('reservations')->where('annonce_id', $value->idAnnonce)->get();

                                foreach ($reservations as $data) {
                                    # code...
                                    $quantiteReserve += $data->quantiteReserve;
                                    //$totalGain += $data->montantReservation;
                                }
                                $totalGain = DB::table('reservations')->where('annonce_id', $value->idAnnonce)->where('livrer',true)->sum('montantReservation');

                                $pourcentageReservation = ($quantiteReserve * 100)/$value->quantiteDisponible;
                                //dd($reservation);
                            @endphp
                            <div class="progress-labels">
                                <div class=""><span>{{ $value->villeDepart }} </span><i class="fas fa-arrow-right"></i><span> {{ $value->villeArriver }}</span><br><br></div>
                                <div class="" style="text-align: right;">{{ $pourcentageReservation }}%</div>
                            </div>
                            <div class="progress">
                                <div data-percentage="0%" style="width: {{ $pourcentageReservation }}%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach
					</div>

				</div>
			</div>
			<div class="col-12 col-lg-6 col-md-12">
				<h1 class="page-header" style="font-weight: bold; opacity: 0">Nothing</h1>
				<h3 class="page-header" style="font-weight: bold;">Total Gain</h3>
				<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
					<div class="panel-body">
						<div class="large" style="color: #00E38C; font-weight: bolder; font-size: 50px;">{{ $totalGain ?? '' }} <span style="color: #C6C2C2; font-weight: 500;">FCFA</span>
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
						</div>
					</div>
				</div>
			</div>


		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" style="font-weight: bold;">Histogramme</h3>
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="panel-heading">
								<ul class="pull-right">
								</ul>
								<span class="pull-right"></em></span></div>
							<div class="panel-body">
								<div class="canvas-wrapper">
									<!-- <canvas class="chart" id="pie-chart" ></canvas> -->
									<canvas class="main-chart" id="bar-chart-grouped" height="200" width="500"></canvas>
								</div>
							</div>
						</div>

			</div>
		</div>
<br>
<br>
		<!--<div class="row">
			<div class="col-12 col-lg-6 col-md-6">
				<h1 class="page-header" style="font-weight: bolder;">Résidences</h1>
				<h3 class="page-header" style="font-weight: bold;">Chiffres</h3>
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="panel-heading">
								<ul class="pull-right">

								</ul>
								<span class="pull-right"></em></span></div>
							<div class="panel-body">
								<div class="canvas-wrapper">
									<canvas class="chart" id="pie-chart"></canvas>
								</div>
							</div>
						</div>
			</div>
			<div class="col-12 col-lg-6 col-md-6">
				<h1 class="page-header" style="font-weight: bold; opacity: 0">Nothing</h1>
				<h3 class="page-header" style="font-weight: bold;">Total Gain</h3>
				<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
					<div class="panel-body">
						<div class="large" style="color: #00E38C; font-weight: bolder; font-size: 50px;">300 000 <span style="color: #C6C2C2; font-weight: 500;">FCFA</span>
							<br><br>
								<div class="row">
									<div class="col panel panel-teal panel-widget border-right">
										<div class="no-padding">
											<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Riviera 3 </span><br/><br></div>
											<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
										</div>
									</div>
									<div class="col panel panel-teal panel-widget border-right">
										<div class="no-padding">
											<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Marcory  </span><br/><br></div>
											<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
										</div>
									</div>
									<div class="col panel panel-teal panel-widget border-right">
										<div class="no-padding">
											<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Plateau </span><br/><br></div>
											<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
										</div>
									</div>
									<div class="col panel panel-teal panel-widget border-right">
										<div class="no-padding">
											<div class="text-muted" style="font-size: 11px; color: #3C3C3C"><span>Angré </span><br/><br></div>
											<div class="text-muted" style="font-size: 15px; color: #00E38C">20 000<br/></div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>--><!--/.row-->

	<!--<div class="row" style="padding-bottom: 50px">
			<div class="col-lg-12">
				<h3 class="page-header" style="font-weight: bold;">Historique</h3>
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="card-body">
			                  <div class="table-responsive">
			                    <table class="table">
			                      <thead class="text-primary">
			                        <th>
			                          N°
			                        </th>
			                        <th>
			                          Départ
			                        </th>
			                        <th>
			                          Destination
			                        </th>
			                        <th>
			                          Coût
			                        </th>
			                        <th>
			                          Devise
			                        </th>
			                        <th>
			                          Mode de transport
			                        </th>
			                        <th>
			                          Actions
			                        </th>
			                      </thead>
			                      <tbody>
			                        <tr>
			                          <td>
			                            1
			                          </td>
			                          <td>
			                            Abidjan
			                          </td>
			                          <td>
			                            Paris
			                          </td>
			                          <td class="text-primary">
			                            23 000
			                          </td>
			                          <td>
			                            FCFA
			                          </td>
			                          <td>
			                            Avion
			                          </td>
			                          <td>
			                            <button type="button" class="btn vert pure-material-button-contained"><i class="fa fa-eye" style="color: white;"></i> Voir</button>
			                          </td>
			                        </tr>
			                        <tr>
			                          <td>
			                            1
			                          </td>
			                          <td>
			                            Abidjan
			                          </td>
			                          <td>
			                            Paris
			                          </td>
			                          <td class="text-primary">
			                            23 000
			                          </td>
			                          <td>
			                            FCFA
			                          </td>
			                          <td>
			                            Avion
			                          </td>
			                          <td>
			                            <button type="button" class="btn vert pure-material-button-contained"><i class="fa fa-eye" style="color: white;"></i> Voir</button>
			                          </td>
			                        </tr>
			                        <tr>
			                          <td>
			                            1
			                          </td>
			                          <td>
			                            Abidjan
			                          </td>
			                          <td>
			                            Paris
			                          </td>
			                          <td class="text-primary">
			                            23 000
			                          </td>
			                          <td>
			                            FCFA
			                          </td>
			                          <td>
			                            Avion
			                          </td>
			                          <td>
			                            <button type="button" class="btn vert pure-material-button-contained"><i class="fa fa-eye" style="color: white;"></i> Voir</button>
			                          </td>
			                        </tr>
			                        <tr>
			                          <td>
			                            1
			                          </td>
			                          <td>
			                            Abidjan
			                          </td>
			                          <td>
			                            Paris
			                          </td>
			                          <td class="text-primary">
			                            23 000
			                          </td>
			                          <td>
			                            FCFA
			                          </td>
			                          <td>
			                            Avion
			                          </td>
			                          <td>
			                            <button type="button" class="btn vert pure-material-button-contained" ><i class="fa fa-eye" style="color: white;"></i> Voir</button>
			                          </td>
			                        </tr>
			                      </tbody>
			                    </table>
			                  </div>
			                </div>
			              </div>
			            </div>

			</div>--><!--/.row-->

	</div>



@endsection
