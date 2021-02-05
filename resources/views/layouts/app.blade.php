<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous"/>
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />

    <!----Start Section Links for page                                 -->
    <link rel="stylesheet" href="{{ asset('css/index-header.css') }}">
    @yield('css')
    <!----End Section Links for page                                 -->


</head>
<body>
<div class="background">

    <header class="container-fluid d-none d-sm-none d-lg-block d-md-none">
        <nav class="navbar navbar-expand-lg navbar-ligth fixed-top" style="background-color: white; ">
            <a class="navbar-brand indexlogo" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}"  class="d-inline-block align-top img img-responsive" alt="logo"/>
            </a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <i class="fas fa-bars fa-2x" aria-hidden="true"></i>
            </button>
         <ul class="nav navbar-top-links navbar-left">
           <!-- <a id="1" class="nav-item nav-link ah" href="{{ url('/') }}">
              <div class="menu">
                <p>Colis</p>
                <i class="fa fa-shopping-bag fa-align-center fa-2x" aria-hidden="true"></i>
                <hr/>
              </div>
           </a>
          <a  id="2"  class="nav-item nav-link  ah" href="#">
            <div class="menu">
              <p>Mes annonces</p>
              <i class="fa fa-bullhorn fa-align-center fa-2x" aria-hidden="true"></i>
              <hr/>
            </div>
           </a>
          <a id="3"  class="nav-item nav-link ah " href="#">
            <div class="menu">
              <p>Messages</p>
              <i class="fa fa-comments fa-align-center fa-2x" aria-hidden="true"></i>
              <hr/>
            </div>
          </a>-->
          <a  id="4"  class="nav-item nav-link ah " href="{{ route('createAnnonce') }}">
            <div class="menu poste">
              <p>POSTER UN TRAJET</p>
              <i class="fa fa-plus-circle fa-align-center fa-2x" aria-hidden="true"></i>
              <hr/>
            </div>
          </a>
          <a id="5"  class="nav-item nav-link ah" href="{{ route('users.monEspace') }}">
            <div class="menu">
              <p>MON ESPACE</p>
              <i class="fa fa-user fa-align-center fa-2x" aria-hidden="true"></i>
              <hr/>
            </div>
          </a>
          <!--<a id="6"  class="nav-item nav-link ah" href="#">
            <div class="menu">
              <p>Résidence</p>
              <i class="fa fa-home fa-align-center fa-2x" aria-hidden="true"></i>
              <hr/>
            </div>
          </a>
          <a id="7"  class="nav-item nav-link ah" href="#">
            <div class="menu">
              <p>Véhicules</p>
              <i class="fa fa-car fa-align-center fa-2x" aria-hidden="true"></i>
              <hr/>
            </div>
          </a>-->
        </ul>
         <ul class="nav navbar-top-links navbar-right">

           <li class="dropdown space"><a class="count-info" data-toggle="dropdown" href="#" style=" color: #FFF; margin-top: 13px; box-shadow: 0 2px 20px lightgray; border-radius: 50px"></a></li>
           <li class="dropdown"><a class="count-info" data-toggle="dropdown" href="#" style=" color: #FFF; margin-top: 13px; box-shadow: 0 2px 20px lightgray; border-radius: 50px"></a></li>
           <li class="dropdown"><a class="count-info" data-toggle="dropdown" href="#" style=" color: #FFF; margin-top: 13px; box-shadow: 0 2px 20px lightgray; border-radius: 50px"></a></li>
          <li class="dropdown"><a class="count-info" data-toggle="dropdown" href="#" style=" color: #FFF; margin-top: 13px; box-shadow: 0 2px 20px lightgray; border-radius: 50px">
              <i class="fa fa-bell" style="font-size: xx-large;"></i><span class="label label-info">5</span></a>
              <ul class="dropdown-menu dropdown-alerts">
                <li><a href="#">
                  <div><em class="fa fa-envelope"></em> 1 New Message
                    <span class="pull-right text-muted small">3 mins ago</span></div>
                </a></li>
                <li class="divider"></li>
                <li><a href="#">
                  <div><em class="fa fa-heart"></em> 12 New Likes
                    <span class="pull-right text-muted small">4 mins ago</span></div>
                </a></li>
                <li class="divider"></li>
                <li><a href="#">
                  <div><em class="fa fa-user"></em> 5 New Followers
                    <span class="pull-right text-muted small">4 mins ago</span></div>
                </a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="count-info" data-toggle="dropdown" href="#">
              <i class="fas fa-user-circle" style="font-size: 45px; box-shadow: 0 2px 20px lightgray; border-radius: 50px"></i></a>
              <ul class="dropdown-menu dropdown-alerts">
            @auth()
                <li>
                    <a href="{{ route('users.monEspace') }}">
                    <div><em class="fas fa-user"></em> Dashboard</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div><em class="fa falist fa-power-off"></em> Déconnection</div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">
                    <div><em class="fas fa-user"></em> Connexion</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('register') }}">
                    <div><em class="fas fa-pen"></em> Inscription</div>
                    </a>
                </li>
            @endauth

              </ul>
            </li>
          </ul>
          <ul class="nav navbar-top-links navbar-right">

          </ul>
        </li>

        </ul>
        </nav>
        <hr class="d-none d-sm-none d-md-inline d-lg-block" style="height: 0.5px; color: #C6C2C2; background-color: #C6C2C2; margin-left: 260px; margin-right: 10px; margin-top: -27px; width: 1011px;">
    </header>
    <!--mobile header-->
    <header id="hmobile" class="container-fluid   d-block d-sm-block d-lg-none d-md-block" >
        <i id="hamburgerBtn" class="fa fa-bars fa-3x " style="color:#00E38C" aria-hidden="true"></i>
        <div id="mobileMenu" style="display: none;">
            <i id="close" class="fa fa-3x fa-window-close" style="color: white" aria-hidden="true"></i>
            <ul class="menuList">
               <!-- <li>
                    <a class="nav-item nav-link am active " href="#">
                        <div class="menu">
                             <p>Colis</p>
                            <i class="fa fa-shopping-bag fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                   </a>
                </li>
                <li>
                    <a class="nav-item nav-link am" href="#">
                        <div class="menu">
                             <p>Mes annonces</p>
                            <i class="fa fa-bullhorn fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                       </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Messages</p>
                            <i class="fa fa-comments fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>-->
                <li>
                    <a class="nav-item nav-link " href="{{ route('createAnnonce') }}">
                        <div class="menu poste">
                             <p>Poster un Trajet</p>
                            <i class="fa fa-plus-circle  fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="{{ route('users.monEspace') }}">
                        <div class="menu">
                             <p>Mon espace</p>
                            <i class="fa fa-users fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                    </a>
                </li>
                <!--<li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Résidence</p>
                            <i class="fa fa-home fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Véhicules</p>
                            <i class="fa fa-car fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>-->
                @auth()
                    <li>
                        <a href="{{ route('users.monEspace') }}" type="button" class="btn gris pure-material-button-contained">Dashboard</a>

                    </li>
                    <br>
                    <li>
                        <a type="button"  class="btn vert pure-material-button-contained" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <br>
                @else
                    <li>
                        <a href="{{ route('register') }}"  type="button" class="btn gris pure-material-button-contained">Inscription</a>

                    </li>
                    <br>
                    <li>
                        <a href="{{ route('login') }}" type="button" class="btn vert pure-material-button-contained">Connexion</a>
                    </li>
                    <br>
                @endauth
            </ul>
        </div>
    </header>


    @yield('main')

    <footer class="container-fluid">
        <div class="row">
            <div class="col-4">
             <img class="logo" style="overflow: hidden;" src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
        </div>

     </footer>
 <!-- jspart-->
     <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
     <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('js/index.js') }}"></script>
     <script src="{{ asset('js/mobileMenu.js') }}"></script>
     @yield('js')
</div>
 </body>
 </html>
