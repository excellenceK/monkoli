<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MonKoli - Mon Espace </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css-dash/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/styles.css') }}" rel="stylesheet">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body style="padding: 0">

	
    <header class="container-fluid d-none d-sm-none d-lg-block d-md-none">
        <nav class="navbar navbar-expand-lg navbar-ligth" style="background-color: white;">
            <a class="navbar-brand indexlogo" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}"  class="d-inline-block align-top img img-responsive" alt="logo"/>
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav" style="margin-left: 100px;" id="itm">
                <a id="1" class="nav-item nav-link active ah " href="#">
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
              </a>
              <a  id="4"  class="nav-item nav-link ah " href="{{ route('createAnnonce') }}">
                <div class="menu poste">
                     <p>Poster une annonce</p>
                    <i class="fas fa-plus-circle fa-align-center fa-2x" aria-hidden="true"></i>
                    <hr/>
                </div>
              </a>
              <a id="5"  class="nav-item nav-link ah " href="{{ route('users.monEspace') }}">
                <div class="menu">
                     <p>Mon espace</p>
                    <i class="fas fa-user fa-align-center fa-2x" aria-hidden="true"></i>
                    <hr/>
                </div>
              </a>
              <a id="6"  class="nav-item nav-link ah" href="#">
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
              </a>
              <div class="menu">
                      
                @auth
                <!--<li><i class="ti-user"></i> <a href="#"  target="_blank">Dashboard</a></li>
                <li><i class="ti-power-off"></i> <a href="{{route('logout')}}">Deconnexion</a></li>
                <a type="button" class="btn gris pure-material-button-contained" style="color: white" href="{{ route('register') }}">Inscription</a>-->
                <a type="button" class="btn gris pure-material-button-contained logon" href="{{ route('users.monEspace') }}">Dashboard</a> 
                <a  type="button" class="btn  vert pure-material-button-contained logon1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa falist fa-power-off"></i> Deconnexion</a>
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
                <li class="col-12" >
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
                </li>
                <li class="col-12">
                    <a class="nav-item nav-link am" href="{{ route('users.monEspace') }}">
                        <div class="menu">
							<i class="fa fa-users fa-align-center fa-2x" aria-hidden="true"></i>
                             <p>Mon espace</p>
                            <hr/>
                        </div>
                    </a>
                </li>
                <li class="col-12">
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
                </li>
                <br>
                <div class="menu">
                    @auth
                <!--<li><i class="ti-user"></i> <a href="#"  target="_blank">Dashboard</a></li>
                <li><i class="ti-power-off"></i> <a href="{{route('logout')}}">Deconnexion</a></li>
                <a type="button" class="btn gris pure-material-button-contained" style="color: white" href="{{ route('register') }}">Inscription</a>-->
                <li class="col-12">
                    <a type="button" class="btn gris pure-material-button-contained " href="{{ route('users.monEspace') }}">Dashboard</a> 
                </li>
                <br>
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
    <!--Header-->

	<div class="container main">
	<br>
	<br>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-weight: bolder;">Mon Espace</h1>
			</div>
		</div><!--/.row-->

		<div class=" container panel panel-container board" style="box-shadow: 0 0px 26px 5px #C6C2C2; padding:10px">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px;margin-left:5px;">
					<div class="panel panel-teal panel-widget tab active"><a href="{{ url('users/mon-espace') }}">
						<div class="no-padding"><i class="fas fa-chart-pie" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Tableau de bord</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="no-padding"><i class="fas fa-shopping-bag" style="font-size: 35px;"></i>
						<div class="text-muted" style="font-size: 10px;"><br/><span>Colis</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="no-padding"><i class="fas fa-home" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Résidences</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-2" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="no-padding"><i class="fas fa-car" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Véhicules</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-2">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="no-padding"><i class="fas fa-user" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Mes infos personnelles</span></div>
							<!-- <button type="button" class="btn pure2 text-muted" style="background-color: #00E38C; color: white; height: 100px";><i class="fas fa-user" style="font-size: 35px;"></i><br> Mes infos personnelles</button>
 -->
						</div>
					</a>
					</div>
				</div>
			</div><!--/.row-->
		</div>
        <br><br>
		@yield('main')
	
        <script src="{{ asset('js-dash/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('js-dash/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js-dash/chart.min.js') }}"></script>
        <script src="{{ asset('js-dash/chart-data.js') }}"></script>
        <script src="{{ asset('js-dash/easypiechart.js') }}"></script>
        <script src="{{ asset('js-dash/easypiechart-data.js') }}"></script>
        <script src="{{ asset('js-dash/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('js-dash/custom.js') }}"></script>
		<script src="{{ asset('js/mobileMenu.js') }}"></script>

        <script>
        window.onload = function () {
            var chart2 = document.getElementById("bar-chart-grouped").getContext("2d");
            window.myBar = new Chart(chart2).Bar(barChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
            });
            var chart4 = document.getElementById("pie-chart").getContext("2d");
            window.myPie = new Chart(chart4).Pie(pieData, {
            responsive: true,
            segmentShowStroke: false
            });
            window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
            });
        };

    </script>
    </body>
    </html>
