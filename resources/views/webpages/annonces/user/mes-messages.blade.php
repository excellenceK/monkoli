@extends('layouts.monespace')
@section('main')
<section class="content" style="padding-bottom: 100px;">
    <div class="col-lg-12">
        @include('layouts.notification')
      <br>

      @php
          $messages = DB::table('message')->where('receveur', Auth::user()->email)
          ->get();
          //dd($messages);
          //dd(\Carbon\Carbon::now()->format('d-m-Y'));
      @endphp
    </div>
        <div class="table-responsive" >  <!--/.row action=""-->
            @if(count($messages)>0)
                <table class="table table-bordered table-responsive" id="messages-dataTable" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Emetteur</th>
                            <th>Objet</th>
                            <th>Message</th>
                            <th>Envoyé à</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as  $value)
                            <tr>
                                <td>{{ $value->emetteur }}</td>
                                <td>{{ ucwords($value->objet)  }}</td>
                                <td>{{ $value->corpsMessage }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s')  }}</td>

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
                <h6 class="text-center">Aucun message trouvé !!!</h6>
            @endif
        </div>
  </section>
@endsection
@section('script')

  <script>

      $('#messages-dataTable').DataTable( {
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
