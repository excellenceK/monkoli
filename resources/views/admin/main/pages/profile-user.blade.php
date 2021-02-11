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
                    <b>Email</b> <a class="float-right">
                        @if($user->email_verified_at != null)
                            <i class="fas fa-check-square"></i></a>
                        @else
                            <i class="far fa-square"></i>
                        @endif
                  </li>
                  <li class="list-group-item">
                    <b>Téléphone</b> <a class="float-right"><i class="far fa-square"></i></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pièce d'Identité</b> <a class="float-right"><i class="far fa-square"></i></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Bannir</b></a>
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

                        @else
                            <h5>Aucun trajet trouvé pour ce utilisateur</h5>
                        @endif

                    </div>
                    <!-- /.post -->


                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <div class="post">
                            @php

                                $reservations = DB::table('reservations')
                                                ->where('reservations.user_id', $user->id)
                                                ->join('annonces', 'annonces.id', 'reservations.annonce_id')
                                                ->join('transport_colis', 'transport_colis.annonce_id', 'annonces.id')
                                                ->join('users', 'users.id', 'annonces.user_id')
                                                ->get();
                            @endphp
                            @if(count($reservations) >0)
                            <table id="reservations-datatable" class="table table-bordered table-striped table-responsive-sm" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Trajet</th>
                                        <th scope="col">Annonceur</th>
                                        <th scope="col">Contact Annonceur</th>
                                        <th scope="col">Email Annonceur</th>
                                        <th scope="col">Quantité Reservée</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as  $value)
                                        <tr>
                                            <td>{{ strtoupper($value->villeDepart).'-'.strtoupper($value->villeArriver) }}</td>
                                            <td>{{ $value->name.' '.$value->prenom }}</td>
                                            <td>{{ $value->telephone }}</td>
                                            <td>
                                                {{ $value->email }}
                                            </td>
                                            <td>{{ $value->quantiteReserve }}</td>
                                            <td>{{ $value->montantReservation }}</td>
                                            <td>
                                                @if ($value->accepter == null && $value->recuperer == null && $value->livrer == null)
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
                                        <th scope="col">Trajet</th>
                                        <th scope="col">Annonceur</th>
                                        <th scope="col">Contact Annonceur</th>
                                        <th scope="col">Email Annonceur</th>
                                        <th scope="col">Quantité Reservée</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                                <h5>Aucune réservation effectuée par ce utilisateur !</h5>
                            @endif
                        </div>
                  </div>
                  <!-- /.tab-pane -->

                  <!-- tab avis -->
                  <div class="tab-pane" id="avis">
                    <!-- Post -->


                    @if(count($annonces) > 0)
                        @php
                            $countavis = 0;
                        @endphp
                        @foreach($annonces as $annonce)

                            @php
                                $avis = DB::table('avis')
                                        ->where('annonce_id', $annonce->idAnnonce)
                                        ->join('users', 'users.id', 'avis.user_id')
                                        ->select('users.photo', 'users.name', 'users.prenom', 'avis.*')
                                        ->get();
                            @endphp
                            @if(count($avis) >0)
                                {{  $countavis += count($avis) }}
                                @foreach($avis as  $value)
                                    <div class="post">
                                        <div class="user-block">
                                            @if($value->photo)
                                                <img class="img-circle img-bordered-sm"
                                                src="{{ asset('images/'.$value->photo) }}"
                                                alt="User profile picture">
                                            @else
                                                <img class="img-circle img-bordered-sm"
                                                src="{{asset('admin/dist/img/avatar6.png')}}"
                                                alt="User profile picture">
                                            @endif
                                            <span class="username">
                                                <a href="#">{{ $value->name.' '.$value->prenom }}</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">{{ \Carbon\Carbon::parse($value->created_at)->format('d-M-Y H:i:s') }}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            {{$value->commentaire}}
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-down"></i> Désactiver</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> {{ $value->note }}
                                                </a>
                                            </span>
                                        </p>

                                    </div>
                                @endforeach
                            @endif
                        @endforeach

                        @if ($countavis == 0)
                            <h5>Aucun avis trouvé pour ce utilisateur !</h5>
                        @endif

                    @else
                        <h5>Aucun avis trouvé pour ce utilisateur !</h5>
                    @endif

                </div>
                  <!-- end tab avis-->

                  <div class="tab-pane" id="settings">
                      <!-- timeline item -->
                      <div>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-user"></i> {{ $user->name.' '.$user->prenom }}</span> <br>
                          <div class="timeline-body" style=" padding: 25px"> <br>
                            @if($user->cni_recto != null || $user->cni_verso != null)
                            <img src="{{ asset('images/'.$user->cni_recto) }}" style="width: 450px; height:350px" alt="Recto">
                            <img src="{{ asset('images/'.$user->cni_verso) }}" style="width: 450px; height:350px" alt="Verso"> <br><br>
                            <a href="#" type="button" class="btn btn-success">Certifier la pièce d'identité</a>

                            @else
                                <h5>Aucune pièce d'identité trouvée pour ce utilisateur !</h5>
                            @endif

                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
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
