@extends('admin.layouts.app')
@section('main')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Annonces En Cours</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Liste des annonces en cours</li>
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
                                ->where('dateArriver', '>=', \Carbon\Carbon::now())
                                ->select('annonces.id as idAnnonce', 'annonces.typeAnnonce', 'transport_colis.*')
                                ->get();
                @endphp
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($annonces) >0)
                            <table class="table table-bordered dt-responsive nowrap" style="width:100%" id="annonce-en-cours">
                                <thead>
                                  <tr>
                                    <th>Type Annonce</th>
                                    <th>Trajet</th>
                                    <th>Depart</th>
                                    <th>Arrivée</th>
                                    <th>Quantité Disponible</th>
                                    <th>Date Limite Reservations</th>
                                    <th>Reservation En Attente</th>
                                    <th>Reservations Réfusées</th>
                                    <th>Reservations Acceptées</th>
                                    <th>Quantité Récupérée</th>
                                    <th style="width: 40px">Etat</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($annonces as $annonce)
                                    @php
                                        $reservationRefuse = DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                            ->where('accepter', false)
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
                                                            ->get();
                                        $totalGain =  DB::table('reservations')->where('annonce_id', $annonce->idAnnonce)
                                                            ->where('accepter', true)
                                                            ->where('recuperer', true)
                                                            ->where('livrer', true)
                                                            ->sum('montantReservation');
                                        if (count($reservationAcceptes)>0) {
                                            # code...
                                            $etatLivraison = (count($coliLivre) * 100)/( count($reservationAcceptes));

                                        }else {
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
                                        <td>{{ \Carbon\Carbon::parse($annonce->dateLimiteReservation)->format('d-M-Y H:i') }}</td>
                                        <td>{{ count($reservationRefuse)}}</td>
                                        <td>{{ count($reservationAcceptes) }}</td>
                                        <td>{{ $quantiteTransporte }}</td>
                                        <td>{{ count($coliLivre) }}</td>
                                        <td>
                                            <div class="progress progress-lg">
                                                <div class="progress-bar progress-bar-success" style="width: {{ $etatLivraison }}%"></div>
                                            </div>
                                            <span class="badge bg-success">{{ $etatLivraison }}%</span>

                                        </td>
                                        <td>
                                            <button  class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="modal" title="edit" data-backdrop="static" data-target="#editModal{{$annonce->idAnnonce}}"><i class="fas fa-edit"></i></button>
                                            <a href="{{route('admin.reservationsAnnonce', $annonce->idAnnonce) }}" class="btn btn-primary btn-sm float-left mr-1"  style="height:30px; width:30px;border-radius:50%" data-placement="bottom" title="Voir les reservations"><i class="fas fa-plus"></i></a>

                                            <form method="POST" action="{{route('admin.deleteAnnonce',$annonce->idAnnonce)}}">
                                             @csrf
                                                @method('get')
                                                <button class="btn btn-danger btn-sm float-left mr-1 dltBtn2" data-pol={{$annonce->idAnnonce}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>

                                        <!-- Edit Status User Modal-->
                                            <div class="modal fade" id="editModal{{$annonce->idAnnonce}}" tabindex="-1" role="dialog" aria-labelledby="#editModal{{$annonce->idAnnonce}}Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="#editModal{{$annonce->idAnnonce}}Label">Désactiver l'annonce</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form  method="post" action="{{ route('admin.editAnnonce',$annonce->idAnnonce) }}" id="editForm" >
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>Statut<span>*</span></label>
                                                                        <select name="status" id="" style="width: 100%">
                                                                            <option value="active" selected>Active</option>
                                                                            <option value="inactive">Inactive</option>
                                                                        </select>
                                                                        <!--<input name="email" type="hidden"  style="width: 100%" placeholder="Entrez votre adresse email" value="">-->
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group button">
                                                                        <button type="submit" class="btn btn-primary ">Editer</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                         <!--End Edit Status User Modal-->

                                        <!--Send Message Modal-->
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

@section('script')

<script>
    $('#annonce-en-cours').DataTable( {
          "columnDefs":[
              {
                  "orderable":false,
                  "targets":[6,7]
              }
          ],
          language: {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
          }
      } );

      // Sweet alert

      function deleteData(id){

      }
</script>
<script>
    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $('.dltBtn2').click(function(e){
          var form=$(this).closest('form');
            var dataID=$(this).data('pol');
             alert(form);
            e.preventDefault();
            swal({
                  title: "Êtes-vous sûr?",
                  text: "Une fois supprimées, vous ne pourrez plus récupérer ces données!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                     form.submit();
                  } else {
                      swal("Vos données sont en sécurité!");
                  }
              });
        })
    })
</script>
@endsection
