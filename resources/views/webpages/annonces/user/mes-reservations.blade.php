@extends('layouts.monespace')
@section('main')
<section class="content" style="padding-bottom: 100px;">
    <div class="col-lg-12">
        @include('layouts.notification')
      <br>

      @php
          $reservations = DB::table('reservations')->where('reservations.user_id', Auth::user()->id)
          ->join('annonces', 'annonces.id', 'reservations.annonce_id')
          ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
          ->get();
          //dd($reservations);
      @endphp
    </div>
        <div class="table-responsive" >  <!--/.row action=""-->
            @if(count($reservations)>0)
                <table class="table table-bordered table-responsive" id="reservation-dataTable" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Trajet</th>
                            <th>Date</th>
                            <th>Quantite</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Recupéré</th>
                            <th>Date de Recuperation</th>
                            <th>Livré</th>
                            <th>Date de Livraison</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as  $value)
                            <tr>
                                <td>{{ $value->villeDepart.'-'.$value->villeArriver }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i')  }}</td>
                                <td>{{ $value->quantiteReserve }}</td>
                                <td>{{ $value->montantReservation }}</td>
                                <td>
                                    @if($value->accepter == true)
                                        Accepté
                                    @elseif( $value->accepter == null)
                                        En attente
                                    @elseif($value->accepter == false)
                                        Refusé
                                    @endif
                                </td>
                                <td>
                                    @if($value->recuperer == true)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </td>
                                <td>
                                    {{ $value->dateEntree }}
                                </td>
                                <td>
                                    @if($value->livrer == true)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </td>
                                <td>
                                    {{ $value->dateSortie }}
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
                <h6 class="text-center">Aucune reservation trouvée !!!</h6>
            @endif
        </div>
  </section>
@endsection
@section('script')

  <script>

      $('#reservation-dataTable').DataTable( {
        "order": [[ 0, "desc" ]],
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[8]
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
