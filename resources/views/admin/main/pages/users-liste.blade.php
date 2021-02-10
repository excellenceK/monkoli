@extends('admin.layouts.app')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Utilisateurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Utilisateurs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      @include('layouts.notification')
      @php
          $users = DB::table('users')->where('role', 'user')->where('status', 'active')->get();
          //dd($users);
      @endphp
    </section>
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Liste des Utilisateurs </h3>
                    </div>
                    <!-- /.card-header -->
                    @if(count($users)>0)
                        <div class="card-body">
                            <table id="users-datatable" class="table table-bordered table-striped table-responsive-sm" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Date Inscription</th>
                                        <th scope="col">Pays</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->genre.' '.$value->name.' '.$value->prenom }}</td>
                                            <td>{{ $value->telephone }}</td>
                                            <td> {{ $value->email }}</td>
                                            <td>
                                                @if($value->photo)
                                                    <img src="{{$value->photo}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$value->photo}}">
                                                @else
                                                    <img src="{{asset('admin/dist/img/avatar6.png')}}" class="img-fluid rounded-circle" style="max-width:50px" alt="avatar.png">
                                                @endif
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($value->created_at)->diffForHumans() }}
                                            </td>
                                            <td>{{ $value->pays }}</td>
                                            <td>
                                                @if($value->status=='active')
                                                    <span class="badge badge-success">{{$value->status}}</span>
                                                @else
                                                    <span class="badge badge-warning">{{$value->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.profileUser', $value->id) }}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Voir Profile" data-placement="bottom"><i class="fas fa-user"></i></a>
                                                <button class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="modal" title="Editer" data-backdrop="static" data-target="#editModal{{$value->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button"  class="btn btn-primary btn-sm float-left mr-1"  style="height:30px; width:30px;border-radius:50%" data-toggle="modal" title="Envoyer message"  data-backdrop="static" data-target="#delModal{{$value->id}}"><i class="fas fa-envelope"></i></button>

                                                <form method="POST" action="{{ route('admin.deleteUser', $value->id) }}">
                                                @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm float-left mr-1 dltBtn" data-id={{$value->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                            <!--Send Message Modal-->
                                            <div class="modal fade" id="delModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$value->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="#delModal{{$value->id}}Label">Envoyer message</h5>
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
                                                                        <input name="subject" type="text" id="subject" style="width: 100%" placeholder="Entrez l'objet du message">
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
                                            <!-- End Send Message Modal-->

                                            <!-- Edit Status User Modal-->
                                            <div class="modal fade" id="editModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="#editModal{{$value->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="#editModal{{$value->id}}Label">Editer Information Utilisateur</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form  method="post" action="{{ route('admin.editUser',$value->id) }}" id="editForm" >
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>Statut<span>*</span></label>
                                                                        <select name="status" id="" style="width: 100%">
                                                                            <option value="active" selected>Active</option>
                                                                            <option value="inactive">Inactive</option>
                                                                        </select>
                                                                        <input name="email" type="hidden"  style="width: 100%" placeholder="Entrez votre adresse email" value="{{ $value->email }}">
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
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Date Inscription</th>
                                        <th>Pays</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <h6>Pas d'utilisateur enrégistré</h6>
                    @endif
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->


    </section>
</div>

@endsection

@section('script')
  <script>

    $('#users-datatable').DataTable( {
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
