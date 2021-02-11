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
    <!--DataTable Css -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />


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
    <link rel="stylesheet" href="{{ asset('css/indexDash.css') }}">


</head>

<body style="padding: 0">


    @include('layouts.monespace-header')
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
                @include('layouts.monespace-menu')
            </div>
            <br>
            @yield('main')
        </div>

        <footer class="container-fluid">
            <div class="row">
                <div class="col-4">
                 <img class="logo" style="overflow: hidden;" src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
            </div>

         </footer>
        <script src="{{ asset('js-dash/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('js-dash/chart.min.js') }}"></script>
        <script src="{{ asset('js-dash/chart-data.js') }}"></script>
        <script src="{{ asset('js-dash/easypiechart.js') }}"></script>
        <script src="{{ asset('js-dash/easypiechart-data.js') }}"></script>
        <script src="{{ asset('js-dash/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('js-dash/custom.js') }}"></script>
        <script src="{{ asset('js/mobileMenu.js') }}"></script>

        <!--DATATABLE JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


        @yield('script')
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
