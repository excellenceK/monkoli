@extends('layouts.monespace')
@section('main')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 main" style="margin-left: 120px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('success')}}
            </div>
        @endif
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header" style="font-weight: bolder;">Listes des reservations</h2>
					<h4 style="font-weight: bold;">Reservation </h4>
			</div>
        </div><!--/.row-->
        @php
            $annonce = DB::table('annonces')
                        ->where('annonces.id', $annonce_id)
                        ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                        ->join('users', 'users.id', 'annonces.user_id')
                        ->first();
            $reservations = DB::table('reservations')
                            ->where('annonce_id', $annonce_id)
                            ->get();
            $quantiteReserve = 0;
            foreach ($reservations as  $value) {
                # code...
                $quantiteReserve += $value->quantiteReserve;
            }
            $disponible = $annonce->quantiteDisponible?? 0 - $quantiteReserve;
           // dd($annonce);

           $reservationsEnAttente = DB::table('reservations')
                            ->where('annonce_id', $annonce_id)
                            ->where('accepter', null)
                            ->join('users', 'users.id', 'reservations.user_id')
                            ->select('reservations.*', 'users.name', 'users.prenom')
                            ->get();
            //dd($reservationsEnAttente);
            $reservationsAccepte = DB::table('reservations')
                            ->where('annonce_id', $annonce_id)
                            ->where('accepter', true)
                            ->join('users', 'users.id', 'reservations.user_id')
                            ->select('reservations.*', 'users.name', 'users.prenom')
                            ->get();
        @endphp

<!-- Reservation-->
		<div class="row" style="margin-bottom: 50px;">
			<div class="col-sm-10 col-md-12">

				<div class="col-lg-5 " style="    padding-top: 40px;">
	                <div class="col-xs-5 col-lg-12 no-padding">
	                  <div class="card  thumbnail col-12 col-md-12 col-sm-8 col-lg-4" itemscope="" itemtype="http://schema.org/CreativeWork" style="width:auto; padding-left: 0px; padding-right: 0px;">
	                    <img class="card-img-top img img-responsive"  src="{{ asset('images/bg_card.png') }}" alt="Card image cap">
	                    <div class="card-body row">
	                      <br>
	                      <div class="col-sm-3" style="margin-left: 20px;">
	                        <i class="fa fa-user-circle fa-3x fa-align-center offset-1" style="color: #C6C2C2;" aria-hidden="true"></i>
	                        <br>
	                        <h5 style="font-size: x-small;font-weight: bold;">Transporteur</h5>
	                        <h6 class="text-truncate" style="font-size: xx-small;font-weight: bold;color: #C6C2C2;">{{ $annonce->name.' '.$annonce->prenom }}</h6>
	                        <i class="fa fa-star valide"  aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star valide" aria-hidden="true"></i><i class="fa fa-star novalide" aria-hidden="true"></i>
	                      </div>
	                      <div class="col-sm-4">
	                         <p class="" style="color: #00E38C;font-weight: bold;">{{ $annonce->prixUnitaire }}<sup style="color:black">Fcfa</sup><br>
	                            <span style="color:black; font-size: x-small;">Par Kg</span>
	                        </p>
	                        <br>
	                         <p style="color:black;font-size:x-small;">Lieu du dépot <br>
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

				<div class="col-lg-7">
				<h3 class="page-header" style="font-weight: bold;">En Attente</h3>
				<div class="row">
					<div class="col-md-16">
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="card-body">
			                  <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                      <th>Demande de Reservations</th>
                                      <th>Date</th>
                                      <th>Qté</th>
                                      <th>Montant</th>
                                      <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($reservationsEnAttente as $item)
                                      <tr>
                                        <td>
                                          {{ $item->name.' '.$item->prenom }}
                                        </td>
                                        <td>
                                          {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}
                                        </td>
                                        <td>
                                          {{ $item->quantiteReserve }}
                                        </td>
                                        <td>
                                            {{ $item->montantReservation }}
                                        </td>
                                        <td>
                                          <a href="{{ route('users.accepteReservation',$item->id) }}" type="button" class="btn vert pure-material-button-contained"><i class="fa fa-check" style="color: white;"></i>&nbsp; Accepter</a>&nbsp;
                                          <a href="{{ route('users.refuserReservation', $item->id) }}" type="button" class="btn pure-material-button-contained" style="background-color: red"><i class="fa fa-times" style="color: white;"></i>&nbsp;&nbsp; Rejeter</a>
                                        </td>
                                      </tr>

                                    @endforeach

                                    </tbody>
                                  </table>

			                  </div>
			                </div>
			              </div>
			            </div>

						</div>
					</div>
				<div class="col-lg-7 col-lg-offset-5">
				<h3 class="page-header" style="font-weight: bold;">Acceptée(s)</h3>
				<div class="row">
					<div class="col-md-16">
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="card-body">
			                  <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                      <th>
                                        Reservations de
                                      </th>
                                      <th>
                                        Date
                                      </th>
                                      <th>
                                        Qté
                                      </th>
                                      <th>
                                          Montant
                                      </th>
                                      <th>
                                        Statut
                                      </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($reservationsAccepte as $item)
                                      <tr>
                                        <td>
                                            {{ $item->name.' '.$item->prenom }}
                                        </td>
                                        <td>
                                            {{ $item->montantReservation }}
                                        </td>
                                        <td>
                                            {{ $item->quantiteReserve }}
                                        </td>
                                        <td>
                                            {{ $item->montantReservation }}
                                        </td>
                                        <td>
                                          <span><i class="fas fa-check-circle" style="font-size: 30px; color: #00E38C"></i></span>
                                      </tr>
                                    @endforeach

                                    </tbody>
                                  </table>
			                  </div>
			                </div>
			              </div>
			            </div>

					</div>

			</div>

		<br><br>


		</div>

		</div><!--/.row-->
<!-- Reservation-->



	</div>

@endsection
