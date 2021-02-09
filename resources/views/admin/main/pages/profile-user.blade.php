@extends('admin.layouts.app')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Utilisateur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
        $user = DB::table('users')->where('id', $id)->first();
    @endphp
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if($user->photo)
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('images/'.$user->photo) }}"
                        alt="User profile picture">
                    @else
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('admin/dist/img/avatar6.png')}}"
                        alt="User profile picture">
                    @endif

                </div>

                <h3 class="profile-username text-center">{{ $user->name.' '.$user->prenom }}</h3>

                <p class="text-muted text-center">{{ $user->typeCompte }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><i class="fas fa-check-square"></i></a>
                  </li>
                  <li class="list-group-item">
                    <b>Téléphone</b> <a class="float-right"><i class="far fa-square"></i></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pièce d'Identité</b> <a class="float-right"><i class="far fa-square"></i></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informations Personnelles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user mr-1"></i> Identité</strong>

                <p class="text-muted">
                    {{ $user->genre.' '.$user->prenom.' '.$user->name.' né(e) le  '}}
                    @if($user->dateNaissance != null)
                        {{ \Carbon\Carbon::parse($user->dateNaissance)->format('d-M-Y') }} <br>
                    @else
                        [non défini] <br>
                    @endif
                    Email: {{ $user->email  }} <br>
                    Téléphone: {{ $user->telephone }}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{ $user->pays. ' '.$user->ville.' '.$user->adresse.' '.$user->complementAdresse }}</p>

                <hr>
                @if($user->typeCompte == 'professionnel')
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Entreprise</strong>

                    <p class="text-muted">
                        <span class="tag tag-danger">ID: {{ $user->idEntreprise }}</span>
                        <span class="tag tag-success">NOM: {{ $user->nomEntreprise }}</span>
                        <span class="tag tag-info">DOMICILIATION: {{ $user->paysDomiciliation }}</span>
                    </p>
                    <hr>
                @endif
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">[Pas de note]</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Trajets</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Reservation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#avis" data-toggle="tab">Avis Reçus</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Pièce d'Identité</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        @php
                            $annonces = DB::table('annonces')
                                        ->where('user_id', $user->id)
                                        ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                                        ->select('annonces.id as idAnnonce', 'annonces.*', 'transport_colis.*')
                                        ->get();
                            //dd($annonces);
                        @endphp

                        @if(count($annonces)>0)
                        @foreach($annonces as $value)
                            @php
                                $reservations = DB::table('reservations')->where('accepter', true)->where('annonce_id', $value->idAnnonce)->get();
                                $quantiteReserve = 0;
                                $pourcentageReservation = 0;
                                foreach ($reservations as $data) {
                                    # code...
                                    $quantiteReserve += $data->quantiteReserve;
                                    //$totalGain += $data->montantReservation;
                                }
                                $pourcentageReservation = ($quantiteReserve * 100)/$value->quantiteDisponible;
                            @endphp

                        <table id="users-datatable" class="table table-bordered table-striped table-responsive-sm" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Trajet</th>
                                    <th scope="col">Départ</th>
                                    <th scope="col">Arrivé</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Reservations(%)</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ strtoupper($value->villeDepart).'-'.strtoupper($value->villeArriver) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->dateDepart)->format('d-M-Y') }}</td>
                                        <td> {{ \Carbon\Carbon::parse($value->dateArriver)->format('d-M-Y') }}</td>
                                        <td>{{ $value->quantiteDisponible }}</td>
                                        <td>{{ $value->prixUnitaire }}</td>
                                        <td>
                                            <div class="progress-labels">
                                                <div class="" style="text-align: right;">{{ $pourcentageReservation }}%</div>
                                            </div>
                                            <div class="progress">
                                                <div data-percentage="0%" style="width: {{ $pourcentageReservation }}%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($value->dateArriver > \Carbon\Carbon::now())
                                                <span class="badge badge-success">en cours</span>
                                            @else
                                                <span class="badge badge-warning">expiré</span>
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
                                    <th scope="col">N°</th>
                                    <th scope="col">Trajet</th>
                                    <th scope="col">Départ</th>
                                    <th scope="col">Arrivé</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Reservations(%)</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        @endforeach

                        @else
                            <h5>Aucun trajet trouvé pour ce utilisateur</h5>
                        @endif

                    </div>
                    <!-- /.post -->


                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <!-- tab avis -->
                  <div class="tab-pane" id="avis">
                    <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                            </p>

                            <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                                </a>
                            </span>
                            </p>

                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                        </div>
                    <!-- /.post -->
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- end tab avis-->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
