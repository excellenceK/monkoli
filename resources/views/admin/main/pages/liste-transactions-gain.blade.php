@extends('admin.layouts.app')
@section('main')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste des transactions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Liste des transactions</li>
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
                  <h3 class="card-title">Liste des transactions</h3>
                </div>
                @php
                    $annonces = DB::table('annonces')
                                ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                                ->where('dateArriver', '<', \Carbon\Carbon::now())
                                ->join('users', 'users.id', 'annonces.user_id')
                                ->select('annonces.id as idAnnonce','users.name', 'users.prenom', 'annonces.typeAnnonce', 'transport_colis.*')
                                ->get();


                @endphp
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($annonces) >0)
                            <table class="table table-bordered dt-responsive nowrap" style="width:100%" id="annonce-en-cours">
                                <thead>
                                  <tr>
                                    <th>Annonceur</th>
                                    <th>Trajet</th>
                                    <th>Quantité Tansportée</th>
                                    <th>Montant Généré</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($annonces as $annonce)
                                    @php
                                        $montantTransactions  = DB::table('reservations')
                                                                ->where('annonce_id', $annonce->idAnnonce)
                                                                ->where('accepter', true)
                                                                ->where('recuperer', true)
                                                                ->where('livrer', true)
                                                                ->sum('montantReservation');
                                        $quantiteTransporte  = DB::table('reservations')
                                                                ->where('annonce_id', $annonce->idAnnonce)
                                                                ->where('accepter', true)
                                                                ->where('recuperer', true)
                                                                ->where('livrer', true)
                                                                ->sum('quantiteReserve');

                                    @endphp
                                    <tr>
                                        <td>{{ strtoupper($annonce->name).' '.strtoupper($annonce->prenom) }}</td>
                                        <td>{{ strtoupper($annonce->villeDepart).'-'.strtoupper($annonce->villeArriver) }}</td>
                                        <td>{{ $quantiteTransporte }}</td>
                                        <td>{{ $montantTransactions }}</td>

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
