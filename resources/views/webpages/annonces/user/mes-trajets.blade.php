@extends('layouts.monespace')
@section('main')
<section class="content" style="padding-bottom: 100px;">
    <div class="col-lg-12">
        @include('layouts.notification')
      <br>

      @php
          $trajets = DB::table('annonces')->where('annonces.user_id', Auth::user()->id)
                        ->join('transport_colis', 'annonces.id', 'transport_colis.annonce_id')
                        ->join('users', 'annonces.user_id', 'users.id')
                        ->get();
          //dd($trajets);
          //dd(\Carbon\Carbon::now()->format('d-m-Y'));
      @endphp
    </div>
        <div class="table-responsive" >  <!--/.row action=""-->
            @if(count($trajets)>0)
                <table class="table table-bordered dt-responsive nowrap" style="width:100%" id="trajet-dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Trajet</th>
                            <th>Date de départ</th>
                            <th>Date d'arrivée</th>
                            <th>Moyen de transport</th>
                            <th>Quantité minimum</th>
                            <th>Quantité totale</th>
                            <th>Date de réservation</th>
                            <th>lieu de dépot</th>
                            <th>lieu de livraison</th>
                            <th>Prix(par Kg)</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trajets as  $value)
                            <tr>
                                <td>{{ strtoupper($value->villeDepart).'-'.strtoupper($value->villeArriver) }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->dateDepart)->format('d-m-Y')  }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->dateArriver)->format('d-m-Y')  }}</td>
                                <td>{{ ucwords($value->moyenTransport) }}</td>
                                <td>{{ $value->minimunReservation }}</td>
                                <td>{{ $value->unite }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->dateLimiteReservation)->format('d-m-Y')  }}</td>
                                <td>{{ ucwords($value->lieuDepot) }}</td>
                                <td>{{ ucwords($value->lieuLivraison) }}</td>
                                <td>{{ $value->prixUnitaire.' '.$value->devise }}</td>
                                <td>
                                    @if(\Carbon\Carbon::now()->format('d-m-Y') == \Carbon\Carbon::parse($value->dateLimiteReservation)->format('d-m-Y'))
                                        Terminer
                                    @else
                                        En cours

                                    @endif
                                </td>

                                <td>
                                    <a href="#" class="float-left " style="" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="float-left"  style="" data-toggle="modal" title="Ecrire à l'annonceur"  data-backdrop="static" data-target="#delModal{{$value->id}}"><i class="fas fa-envelope"></i></button>

                                    <form method="POST" action="#">
                                    @csrf
                                    @method('delete')
                                        <a href="#" class=" float-left mr-1 dltBtn" data-id={{$value->id}} style="" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center">Aucun trajet trouvé !!!</h6>
            @endif
        </div>
  </section>
@endsection
@section('script')

  <script>

      $('#trajet-dataTable').DataTable( {
        "order": [[ 0, "desc" ]],
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10]
                }
            ],
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        } );

        // Sweet alert
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
                        swal("Vos données sont en sécurité !");
                    }
                });
          })
      })
  </script>

@endsection
