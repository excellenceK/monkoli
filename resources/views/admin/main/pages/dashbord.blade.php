<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          @php
              $montantTransactions  = DB::table('reservations')
                                ->where('accepter', true)
                                ->where('recuperer', true)
                                ->where('livrer', true)
                                ->sum('montantReservation');
             $totalAnnonce = DB::table('annonces')
                                ->count();
             $tatalColiTransport = DB::table('reservations')
                                ->where('accepter', true)
                                ->where('recuperer', true)
                                ->where('livrer', true)
                                ->sum('quantiteReserve');
            $tatalUsers = DB::table('users')
                            ->where('role', 'user')
                            ->count();

          @endphp
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $montantTransactions }} FCFA</h3>

              <p>Montant Total Transactions</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.listTransactionMontant') }}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $totalAnnonce }}<!--<sup style="font-size: 20px">%</sup>--></h3>

              <p>Total Annonces</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.listAnnonceEnCours') }}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $tatalColiTransport }} <sup style="font-size: 20px">kg</sup></h3>

              <p>Total Marchandises Transportées</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('admin.listTransactionMontant') }}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $tatalUsers }}</h3>

              <p>Utilisateurs Inscrits</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.listUsers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Statistiques
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Montant Transactions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Nombre Transactions</a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 450px;">
                    <canvas id="gain-chart-canvas" height="450" style="height: 450px;"></canvas>
                 </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 450px;">
                  <canvas id="annonce-chart-canvas" height="450" style="height: 450px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
