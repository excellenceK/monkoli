@extends('admin.layouts.app')
@section('main')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Annonces Terminées</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Liste des annonces terminées</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Liste Annonces</h3>
                </div>
                @php
                    $annonces = DB::table('annonces')
                                ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                                ->where('dateArriver', '<', \Carbon\Carbon::now())
                                ->select('annonces.id as idAnnonce', 'annonces.typeAnnonce', 'transport_colis.*')
                                ->get();
                @endphp
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($annonces) >0)
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Type Annonce</th>
                                    <th>Trajet</th>
                                    <th>Depart</th>
                                    <th>Arrivée</th>
                                    <th>Quantité Disponible</th>
                                    <th>Reservations Réfusées</th>
                                    <th>Reservations Acceptées</th>
                                    <th>Quantité Transporté</th>
                                    <th>Colis Livré</th>
                                    <th style="width: 40px">Etat</th>
                                    <th>Total Gain</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($annonces as $annonce)
                                        @php
                                            $reservationRefuse = DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                                ->whereIn('accepter', [false, null])
                                                                ->get();
                                            $reservationAcceptes = DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                                ->where('accepter', true)
                                                                ->get();

                                            $quantiteTransporte = DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                                ->where('accepter', true)
                                                                ->where('recuperer', true)
                                                                ->sum('quantiteReserve');
                                            $coliLivre = DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                                ->where('accepter', true)
                                                                ->where('recuperer', true)
                                                                ->where('livrer', true)
                                                                ->get();
                                            $totalGain =  DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                                ->where('accepter', true)
                                                                ->where('recuperer', true)
                                                                ->where('livrer', true)
                                                                ->sum('montantReservation');

                                            if (count($reservationAcceptes)>0) {
                                                        # code...
                                                $etatLivraison = (count($coliLivre) * 100)/( count($reservationAcceptes));

                                            }else{
                                                        # code...
                                                $etatLivraison =0;
                                            }


                                        @endphp
                                    <tr>
                                        <td>{{ $annonce->typeAnnonce }}</td>
                                        <td>{{ $annonce->villeDepart.'-'.$annonce->villeArriver }}</td>
                                        <td>{{ \Carbon\Carbon::parse($annonce->dateDepart)->format('d-M-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($annonce->dateArriver)->format('d-M-Y') }}</td>
                                        <td>{{ $annonce->quantiteDisponible }}</td>
                                        <td>{{ count($reservationRefuse)}}</td>
                                        <td>{{ count($reservationAcceptes) }}</td>
                                        <td>{{ $quantiteTransporte }}</td>
                                        <td>{{ count($coliLivre) }}</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: {{ $etatLivraison }}%"><span class="badge bg-success">{{ $etatLivraison }}%</span></div>
                                            </div>

                                        </td>
                                        <td>{{ $totalGain }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach

                                </tbody>
                              </table>
                    @else
                        <h5>Aucune Annonces trouvée !</h5>
                    @endif

                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
