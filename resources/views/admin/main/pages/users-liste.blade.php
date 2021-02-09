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
                                                {{(($value->created_at)? $value->created_at->diffForHumans() : '')}}
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
                                                <a href="" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <button type="button"  class="btn btn-primary btn-sm float-left mr-1"  style="height:30px; width:30px;border-radius:50%" data-toggle="modal" title="Envoyer message"  data-backdrop="static" data-target="#delModal{{$value->id}}"><i class="fas fa-envelope"></i></button>

                                                <form method="POST" action="">
                                                @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm float-left mr-1 dltBtn" data-id={{$value->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
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
