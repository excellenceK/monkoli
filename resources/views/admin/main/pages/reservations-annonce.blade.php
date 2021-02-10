@extends('admin.layouts.app')
@section('main')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              @php
                  $annonce = DB::table('annonces')->where('annonces.id', $idAnnonce)->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')->first();
              @endphp
            <h1>Liste des reservations du trajet : <b>{{ strtoupper($annonce->villeDepart).'-'.strtoupper($annonce->villeArriver) }} </b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $annonce->villeDepart.'-'.$annonce->villeArriver }}</li>
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
                  <h3 class="card-title">Liste Reservation</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($reservations)>0)
                        <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="reservationsA">
                            <thead>
                                <tr>
                                    <th>Demandeur</th>
                                    <th>Quantité Reservée</th>
                                    <th>Date Reservation</th>
                                    <th>Montant Reservation</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as  $value)
                                        <tr>
                                            <td>{{ $value->name.' '.$value->prenom }}</td>
                                            <td>{{ $value->quantiteReserve }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</td>
                                            <td>{{ $value->montantReservation }}</td>
                                            <td>
                                                @if($value->accepter == null && $value->recuperer == null && $value->livrer == null)
                                                    <span class="badge badge-success">En attente de validation par l'annonceur </span>
                                                @elseif($value->accepter == true && $value->recuperer == null && $value->livrer == null )
                                                    <span class="badge badge-success">Accepté, en attente de récupération </span>
                                                @elseif($value->accepter == true && $value->recuperer == true && $value->livrer == null)
                                                    <span class="badge badge-warning">Récupéré, en attente de livraison</span>
                                                @elseif($value->accepter == true && $value->recuperer == true && $value->livrer == true)
                                                    <span class="badge badge-success">Livré, course terminée avec succès </span>
                                                @elseif($value->accepter == false)
                                                    <span class="badge badge-danger">Réfusé, l'annonceur n'a pas donné son accord</span>
                                                @else
                                                    <span class="badge badge-warning">[statut inconnu]</span>
                                                @endif
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5>Aucune reservation trouvée pour cette annonce !</h5>
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
    $('#reservationsA').DataTable({
          "columnDefs":[
              {
                  "orderable":false,
                  "targets":[4]
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
        $('.dltBtn').click(function(e){
          var form=$(this).closest('form');
            var dataID=$(this).data('id');
            // alert(dataID);
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
