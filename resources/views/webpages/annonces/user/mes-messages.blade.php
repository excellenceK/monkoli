@extends('layouts.monespace')
@section('main')
<section class="content" style="padding-bottom: 100px;">
    <div class="col-lg-12">
        @include('layouts.notification')
      <br>

      @php
          $messages = DB::table('messages')->where('email', Auth::user()->email)
                        ->get();
          //dd($messages);
          //dd(\Carbon\Carbon::now()->format('d-m-Y'));
      @endphp
    </div>
        <div class="table-responsive" >  <!--/.row action=""-->
            @if(count($messages)>0)
                <table class="table table-bordered dt-responsive nowrap" style="width:100%" id="messages-dataTable" >
                    <thead>
                        <tr>
                            <th>Emetteur</th>
                            <th>Objet</th>
                            <th>Message</th>
                            <th>Envoyé le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as  $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ ucwords($value->subject)  }}</td>
                                <td>
                                    @if($value->read_at == null)
                                       <a href="#" data-toggle="modal" title="edit" data-backdrop="static" data-target="#editModal{{$value->id}}"> <i class="fas fa-eye fa-3x" style="color: green"></i></a>
                                    @else
                                        <a href="#" data-toggle="modal" title="edit" data-backdrop="static" data-target="#editModal{{$value->id}}">{{ substr($value->message,0,10).'....' }}</a>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s')  }}</td>

                                <td>
                                    <a href="#" class="float-left"  style="" data-toggle="modal" title="Repondre"  data-backdrop="static" data-target="#sendModal{{$value->id}}"><i class="fas fa-envelope"></i></button>

                                    <form method="POST" action="{{ route('message.destroy',$value->id) }}">
                                    @csrf
                                        @method('delete')
                                        <a href="#" class=" float-left mr-1 dltBtn" data-id={{$value->id}} style="" data-toggle="tooltip" data-placement="bottom" title="Supprimer"><i class="fas fa-trash-alt"></i></a>
                                    </form>

                                </td>
                                <!-- Edit Status User Modal-->
                                <div class="modal fadeF" id="editModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="#editModal{{$value->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="#editModal{{$value->id}}Label">Désactiver l'annonce</h5>
                                               <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>-->
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    {{ $value->message }}
                                                </p>

                                            </div>
                                            <div class="modal-footer">
                                                    <a href="{{ route('message.update', $value->id) }}" type="button">Fermer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <!--End Edit Status User Modal-->

                             <!--Reply to messge-->
                                <div class="modal fade" id="sendModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="#sendModal{{$value->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog"> <br><br><br><br> <br> <br> <br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="#sendModal{{$value->id}}Label">Repondre à {{ $value->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post" action="{{ route('admin.sendMessage') }}" id="contactForm" novalidate="novalidate">
                                                @csrf
                                                <div class="row">
                                                    <!--<div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label>Votre Nom<span>*</span></label>
                                                            <input name="name" id="name" type="text" placeholder="Entrez votre nom">
                                                        </div>
                                                    </div>-->
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group">
                                                            <label>Objet<span>*</span></label>
                                                            <input name="subject" type="text" id="subject" style="width: 100%" placeholder="Entrez l'objet du message" value="Reponse">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group">
                                                            <label>Destinataire<span>*</span></label>
                                                            <input name="email" type="email" id="email" style="width: 100%" placeholder="Entrez votre adresse email" value="{{ $value->email }}">
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label>Téléphone<span>*</span></label>
                                                            <input id="phone" name="phone" type="number" placeholder="Entrez votre numéro de téléphone">
                                                        </div>
                                                    </div>-->
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group message">
                                                            <label>Votre Message<span>*</span></label>
                                                            <textarea name="message" id="message" cols="30" rows="9" style="width: 100%" placeholder="Entrez votre message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn btn-primary ">Envoyer Votre Message</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                             <!--End Reply-->
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
                    "targets":[4]
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
