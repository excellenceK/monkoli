<div class="row">
    <div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px;margin-left:5px;">
        <div class="panel panel-teal panel-widget tab {{ (request()->is('users/mon-espace')) ? 'active' : '' }}"><a href="{{ url('users/mon-espace') }}">
            <div class="no-padding"><i class="fas fa-chart-pie" style="font-size: 35px;"></i>
                <div class="text-muted" style="font-size: 10px;"><br/><span>Tableau de bord</span></div>
            </div>
        </a>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px">
        <div class="panel panel-teal panel-widget tab"><a href="#">
            <div class="no-padding"><i class="fas fa-shopping-bag" style="font-size: 35px;"></i>
            <div class="text-muted" style="font-size: 10px;"><br/><span>Mes Trajets</span></div>
            </div>
        </a>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px">
        <div class="panel panel-teal panel-widget tab {{ (request()->is('users/mes-reservations')) ? 'active' : '' }}"><a href="{{ route('users.mesReservations') }}">
            <div class="no-padding"><i class="fas fa-home" style="font-size: 35px;"></i>
                <div class="text-muted" style="font-size: 10px;"><br/><span>Mes Reservations</span></div>
            </div>
        </a>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px">
        <div class="panel panel-teal panel-widget tab"><a href="#">
            <div class="no-padding"><i class="fas fa-envelope" style="font-size: 35px;"></i>
                <div class="text-muted" style="font-size: 10px;"><br/><span>Messages</span></div>
            </div>
        </a>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-2">
        <div class="panel panel-teal panel-widget tab {{ (request()->is('users/mon-profile')) ? 'active' : '' }} {{ (request()->is('users/type-colis')) ? 'active' : '' }}{{ (request()->is('users/verification-compte')) ? 'active' : '' }}{{ (request()->is('users/avis-utilisateurs')) ? 'active' : '' }}{{ (request()->is('users/notifications')) ? 'active' : '' }}{{ (request()->is('users/change-password')) ? 'active' : '' }}{{ (request()->is('users/fermeture-compte')) ? 'active' : '' }}"><a href="{{ url('users/mon-profile') }}">
            <div class="no-padding"><i class="fas fa-user" style="font-size: 35px;"></i>
                <div class="text-muted" style="font-size: 10px;"><br/><span>Profile</span></div>
                <!-- <button type="button" class="btn pure2 text-muted" style="background-color: #00E38C; color: white; height: 100px";><i class="fas fa-user" style="font-size: 35px;"></i><br> Mes infos personnelles</button>
-->
            </div>
        </a>
        </div>
    </div>
</div><!--/.row-->
