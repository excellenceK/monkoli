<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MonKoli - Mon Espace </title>
    <link href="{{ asset('css-dash/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('css-dash/styles.css') }}" rel="stylesheet">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
      <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>
	<div class="background">
    <header class="container-fluid d-none d-sm-none d-lg-block d-md-none">
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button>
					<a class="navbar-brand indexlogo" href="{{ url('/') }}">
					<img src="{{ asset('images/logo.png') }}"  class="d-inline-block align-top img img-responsive" alt="logo"/>
					</a>
					<ul class="nav navbar-top-links navbar-left">
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						  <div class="navbar-nav" style="margin-top: 10px; margin-left: 200px " id="itm">
							<a id="1" class="nav-item nav-link active" href="#">
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
						  <a  id="4"  class="nav-item nav-link ah " href="page/posterAnnonce1.html">
							<div class="menu poste">
								 <p>Poster une annonce</p>
								<i class="fas fa-plus-circle fa-align-center fa-2x" aria-hidden="true"></i>
								<hr/>
							</div>
						  </a>
						  <a id="5"  class="nav-item nav-link ah " href="#">
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
							<button type="button" class="btn gris pure-material-button-contained logon">Inscription</button>
							<button type="button" class="btn vert pure-material-button-contained logon1">Connexion</button>
						  </div>
						</div>
					</div>
				</ul>
	
				</div>
			</div><!-- /.container-fluid -->
		</nav>
	</header>	
    <!--mobile header-->
    <header id="hmobile" class="container-fluid d-block d-sm-block d-lg-none d-md-block" >
        <div id="mobileMenu" style="display: none;">
            <i id="close" class="fa fa-3x fa-window-close" style="color: white" aria-hidden="true"></i>
            <ul class="menuList">
                <li>
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
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu poste">
                             <p>Ajouter annonce</p>
                            <i class="fa fa-plus-circle  fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                      </a>
                </li>
                <li>
                    <a class="nav-item nav-link " href="#">
                        <div class="menu">
                             <p>Mon espace</p>
                            <i class="fa fa-users fa-align-center fa-2x" aria-hidden="true"></i>
                            <hr/>
                        </div>
                    </a>
                </li>
                <li>
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
                </li>
                <li>
                    <button type="button" class="btn gris pure-material-button-contained">Inscription</button>

                </li>
                <li>
                    <button type="button" class="btn vert pure-material-button-contained">Connexion</button>

                </li>

            </ul>
        </div>
    </header>
    <!--Header-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 main" style="margin-left: 120px;">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-weight: bolder;">Mon Espace</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container board" style="box-shadow: 0 0px 26px 5px #C6C2C2; padding-left: 100px;">
			<div class="row">
				<div class="col-xs-5 col-md-3 col-lg-2 no-padding" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab active"><a href="{{ url('users/mon-espace') }}">
						<div class="row no-padding"><i class="fas fa-chart-pie" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Tableau de bord</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-5 col-md-3 col-lg-2 no-padding" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="row no-padding"><i class="fas fa-shopping-bag" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Colis</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-5 col-md-3 col-lg-2 no-padding" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="row no-padding"><i class="fas fa-home" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Résidences</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-5 col-md-3 col-lg-2 no-padding" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="row no-padding"><i class="fas fa-car" style="font-size: 35px;"></i>
							<div class="text-muted" style="font-size: 10px;"><br/><span>Véhicules</span></div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-5 col-md-3 col-lg-2 no-padding" style="margin-right: 20px">
					<div class="panel panel-teal panel-widget tab"><a href="#">
						<div class="row no-padding"><i class="fas fa-user" style="font-size: 35px;"></i>
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
	</div>
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
