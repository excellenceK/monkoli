@extends('layouts.monespace')

@section('main')
		<div class="row" style="padding-bottom: 50px">
			<div class="col-lg-12">
                <h1 class="page-header" style="font-weight: bolder;">Annonces en cours</h1>
                @php
                    $annonceColi = DB::table('annonces')
                                ->where('dateExpiration', '>=',\Carbon\Carbon::now())
                                ->where('user_id', Auth::user()->id)
                                ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                                ->get();
                                //dd($annonceColi);
                @endphp
				<div class="row">
					<div class="col-md-16">
						<div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2;">
							<div class="card-body">
			                  <div class="table-responsive">
			                    <table class="table">
			                      <thead class="text-primary">
			                        <th>N°</th>
			                        <th>Départ</th>
			                        <th>Destination</th>
			                        <th>Coût</th>
			                        <th>Devise</th>
			                        <th>Mode de transport</th>
			                        <th>Actions</th>
			                      </thead>
			                      <tbody>
                                    @foreach($annonceColi as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->villeDepart }}</td>
                                        <td>{{ $value->villeArriver }}</td>
                                        <td class="text-primary">{{ $value->prixUnitaire }}</td>
                                        <td>{{ $value->devise }}</td>
                                        <td>{{ $value->moyenTransport }}</td>
                                        <td>
                                          <a href="{{ route('users.consulterReservations',$value->id) }}" type="button" class="btn vert pure-material-button-contained"><i class="far fa-eye" style="color: white;"></i> Voir</a>
                                          <button type="button" class="btn gris pure-material-button-contained"><i class="far fa-edit" style="color: white;"></i> Editer</button>
                                            <button type="button" class="btn pure-material-button-contained" style="background-color: red;"><i class="fas fa-trash" style="color: white;"></i> Supprimer</button>
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
				</div><!--/.row-->
		<br><br>

@endsection
