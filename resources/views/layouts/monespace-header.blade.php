<header class="container-fluid d-none d-sm-none d-lg-block d-md-none">
    <nav class="navbar navbar-expand-lg navbar-ligth" style="background-color: white;">
        <a class="navbar-brand indexlogo" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}"  class="d-inline-block align-top img img-responsive" alt="logo"/>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav" style="margin-left: 100px;" id="itm">
           <!-- <a id="1" class="nav-item nav-link active ah " href="#">
                <div class="menu">
                     <p>Colis</p>
                    <i class="fas fa-shopping-bag fa-align-center fa-2x" aria-hidden="true"></i>
                    <hr/>
                </div>
           </a>
           <a  id="2"  class="nav-item nav-link  ah" href="#">
            <div class="menu">
                 <p>Mes annonces</p>
                <i class="fas fa-bullhorn fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
            </div>
           </a>
           <a id="3"  class="nav-item nav-link ah " href="#">
            <div class="menu">
                 <p>Messages</p>
                <i class="fas fa-comments fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
            </div>
          </a>-->
          <!--<a  id="4"  class="nav-item nav-link ah " href="{{ route('createAnnonce') }}">
            <div class="menu poste">
                 <p>Poster une annonce</p>
                <i class="fas fa-plus-circle fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
            </div>
          </a>-->
          <a id="5"  class="nav-item nav-link ah " href="{{ url('/') }}">
            <div class="menu">
                 <p>Accueil</p>
                <i class="fas fa-user fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
            </div>
          </a>
          <!--<a id="6"  class="nav-item nav-link ah" href="#">
            <div class="menu">
                 <p>Résidence</p>
                <i class="fas fa-home fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
            </div>
          </a>
          <a id="7"  class="nav-item nav-link ah" href="#">
            <div class="menu">
                 <p>Véhicules</p>
                <i class="fas fa-car fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
            </div>
          </a>-->
          <div class="menu">

            @auth
               <!-- <li><i class="ti-user"></i> <a href="#"  target="_blank">Dashboard</a></li>
                <li><i class="ti-power-off"></i> <a href="{{route('logout')}}">Deconnexion</a></li>
                <a type="button" class="btn gris pure-material-button-contained" style="color: white" href="{{ route('register') }}">Inscription</a>-->
                    <!--<a type="button" class="btn gris pure-material-button-contained logon" href="{{ route('users.monEspace') }}" >Dashboard</a>-->
                    <a  type="button" class="btn  vert pure-material-button-contained logon1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="margin-right:-100px"><i class="fa falist fa-power-off"></i> Deconnexion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            @else
                <a type="button" href="{{ route('register') }}" class="btn  gris pure-material-button-contained logon">Inscription</a>
                <a type="button" href="{{ route('login') }}" class="btn vert pure-material-button-contained logon1">Connexion</a>

             @endauth
          </div>

        </div>
    </div>
    </nav>
</header>
<!--mobile header-->
<header id="hmobile" class="container-fluid   d-block d-sm-block d-lg-none d-md-block" >
    <i id="hamburgerBtn" class="fa fa-bars fa-3x " style="color:#00E38C" aria-hidden="true"></i>
    <div id="mobileMenu" style="display: none;">
        <i id="close" class="fa fa-3x fa-window-close" style="color: white" aria-hidden="true"></i>
        <ul class="menuList row" style="list-style-type: none;">
            <!--<li class="col-12" >
                <a class="nav-item nav-link am active " href="{{ url('/') }}">
                    <div class="menu">
                        <i class="fa fa-shopping-bag  fa-2x" aria-hidden="true"></i>
                        <p>Colis</p>
                        <hr/>
                    </div>
               </a>
            </li>
            <li class="col-12">
                <a class="nav-item nav-link am" href="#">
                    <div class="menu">
                        <i class="fa fa-bullhorn  fa-2x" aria-hidden="true"></i>
                         <p>Mes annonces</p>
                        <hr/>
                    </div>
                   </a>
            </li>
            <li class="col-12">
                <a class="nav-item nav-link am" href="#">
                    <div class="menu">
                        <i class="fa fa-comments fa-align-center fa-2x" aria-hidden="true"></i>
                         <p>Messages</p>
                        <hr/>
                    </div>
                  </a>
            </li>-->
            <li class="col-12">
                <a class="nav-item nav-link am" href="{{ url('/') }}">
                    <div class="menu">
                        <i class="fa fa-users fa-align-center fa-2x" aria-hidden="true"></i>
                         <p>ACCUEIL</p>
                        <hr/>
                    </div>
                </a>
            </li>
            <!--<li class="col-12">
                <a class="nav-item nav-link am" href="#">
                    <div class="menu">
                        <i class="fa fa-home fa-align-center fa-2x" aria-hidden="true"></i>
                         <p>Résidence</p>
                        <hr/>
                    </div>
                  </a>
            </li>
            <li class="col-12">
                <a class="nav-item nav-link am" href="#">
                    <div class="menu">
                        <i class="fa fa-car fa-align-center fa-2x" aria-hidden="true"></i>
                         <p>Véhicules</p>
                        <hr/>
                    </div>
                  </a>
            </li>
            <li class="col-12">
                <a class="nav-item nav-link am" href="{{ route('createAnnonce') }}">
                    <div class="menu poste">
                        <i class="fa fa-plus-circle fa-align-center  fa-2x" aria-hidden="true"></i>
                         <p>Ajouter <br> annonce</p>
                        <hr/>
                    </div>
                  </a>
            </li>-->
            <br>
            <div class="menu">
                @auth
            <!--<li><i class="ti-user"></i> <a href="#"  target="_blank">Dashboard</a></li>
            <li><i class="ti-power-off"></i> <a href="{{route('logout')}}">Deconnexion</a></li>
            <a type="button" class="btn gris pure-material-button-contained" style="color: white" href="{{ route('register') }}">Inscription</a>-->
            <!--<li class="col-12">
                <a type="button" class="btn gris pure-material-button-contained " href="{{ route('users.monEspace') }}">Dashboard</a>
            </li>
            <br>-->
            <li class="col-12">
                <a  type="button" class="btn  vert pure-material-button-contained " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa falist fa-power-off"></i> Deconnexion</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
             @else
             <li class="col-12">
                <a type="button" href="{{ route('login') }}" class="btn vert pure-material-button-contained ">Connexion</a>
            </li>
            <br>
            <li class="col-12">
                <a type="button" href="{{ route('register') }}" class="btn  gris pure-material-button-contained ">Inscription</a>

            </li>

             @endauth
            </div>



        </ul>
    </div>
</header>
