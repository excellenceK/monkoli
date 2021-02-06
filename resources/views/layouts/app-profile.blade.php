<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/indexDash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index-header.css') }}">



    <title>monkoli</title>
</head>
<body style="padding-top: 0px;">
  <div class="background">

    @include('layouts.monespace-header')

    <section class="container-fluid user-info">
       <div class="col-sm-12 col-sm-offset-3 col-lg-10 main">

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="font-weight: bolder;">Mon Espace</h1>
      </div>
    </div><!--/.row-->

    <div class="panel panel-container board" style="box-shadow: 0 0px 26px 5px #C6C2C2; ">

        @include('layouts.monespace-menu')
        <!--/.row-->
    </div>
  </section>
  <br><br><br>
  <section class="container" style="padding-bottom: 200px;">
    <div class="col-lg-12">
      <br>
    </div>
        <div >  <!--/.row action=""-->
             <div class="panel panel-default" style="box-shadow: 0 0px 26px 5px #C6C2C2; padding: 20px; background-color: white">
                <div class="row main " id="info-personnelle" style="background-color: white; padding-top: 20px; ">
                  <div class="col-lg-3" style="box-shadow: 1px 0px 15px #C6C2C2; border-radius: 10px;">
                    <div id="sidebar-collapse" class="col-sm-3 col-lg-11 sidebar collapse"  aria-expanded="false">
                      <ul class="nav menu" style=" text-align: left;">
                        <li class="{{ (request()->is('users/mon-profile')) ? 'active' : '' }}"><a href="{{ route('users.monProfile') }}"><em class="fa fa-user">&nbsp;</em> Infos perssonelles</a></li>
                        <li class="divider"></li>
                        <li class="{{ (request()->is('users/type-colis')) ? 'active' : '' }}"><a href="{{ route('users.coliTransportes') }}"><em class="fa fa-suitcase-rolling">&nbsp;</em> Types de colis transportés</a></li>
                        <li class="divider"></li>
                        <li class="{{ (request()->is('users/verification-compte')) ? 'active' : '' }}"><a href="{{ route('users.verificationCompte') }}"><em class="fa fa-check-circle">&nbsp;</em> Vérifications </a></li>
                        <li class="divider"></li>
                        <li class="{{ (request()->is('users/avis-utilisateurs')) ? 'active' : '' }}"><a href="{{ route('users.avisUtilisateurs') }}"><em class="fa fa-comment-alt">&nbsp;</em> Avis utilisateurs</a></li>
                        <li class="divider"></li>
                        <li class="{{ (request()->is('users/notifications')) ? 'active' : '' }}"><a href="{{ route('users.notifications') }}"><em class="fa fa-bell">&nbsp;</em> Notifications</a></li>
                        <li class="divider"></li>
                        <li class="{{ (request()->is('users/change-password')) ? 'active' : '' }}"><a href="{{ route('users.changePassword') }}"><em class="fa fa-lock">&nbsp;</em> Changer votre mot de passe</a></li>
                        <li class="divider"></li>
                        <li class="{{ (request()->is('users/fermeture-compte')) ? 'active' : '' }}"><a href="{{ route('users.fermetureCompte') }}"><em class="fa fa-trash">&nbsp;</em> Suppression de compte</a></li>
                      </ul>
                    </div>
                  </div>

                   <!--nav form-->
                  <nav role="navigation">
                      <div id="menuToggle">

                        <input type="checkbox" />

                        <span></span>
                        <span></span>
                        <span></span>

                        <ul id="menu">
                          <ul class="nav menu" style=" text-align: left;">
                            <li class="{{ (request()->is('users/mon-profile')) ? 'active' : '' }}"><a href="{{ route('users.monProfile') }}"><em class="fa fa-user">&nbsp;</em> Infos perssonelles</a></li>
                            <li class="divider"></li>
                            <li class="{{ (request()->is('users/type-colis')) ? 'active' : '' }}"><a href="{{ route('users.coliTransportes') }}"><em class="fa fa-suitcase-rolling">&nbsp;</em> Types de colis transportés</a></li>
                            <li class="divider"></li>
                            <li class="{{ (request()->is('users/verification-compte')) ? 'active' : '' }}"><a href="{{ route('users.verificationCompte') }}"><em class="fa fa-check-circle">&nbsp;</em> Vérifications </a></li>
                            <li class="divider"></li>
                            <li class="{{ (request()->is('users/avis-utilisateurs')) ? 'active' : '' }}"><a href="{{ route('users.avisUtilisateurs') }}"><em class="fa fa-comment-alt">&nbsp;</em> Avis utilisateurs</a></li>
                            <li class="divider"></li>
                            <li class="{{ (request()->is('users/notifications')) ? 'active' : '' }}"><a href="{{ route('users.notifications') }}"><em class="fa fa-bell">&nbsp;</em> Notifications</a></li>
                            <li class="divider"></li>
                            <li class="{{ (request()->is('users/change-password')) ? 'active' : '' }}"><a href="{{ route('users.changePassword') }}"><em class="fa fa-lock">&nbsp;</em> Changer votre mot de passe</a></li>
                            <li class="divider"></li>
                            <li class="{{ (request()->is('users/fermeture-compte')) ? 'active' : '' }}"><a href="{{ route('users.fermetureCompte') }}"><em class="fa fa-trash">&nbsp;</em> Suppression de compte</a></li>
                          </ul>
                        </ul>
                      </div>
                    </nav>
                    <!--nav form-->
                    <style>
                    .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
                      margin: 0;
                      padding: 0;
                      border: none;
                      box-shadow: none;
                      text-align: center;
                    }
                    .kv-avatar {
                      display: inline-block;
                    }
                    .kv-avatar .file-input {
                      display: table-cell;
                      width: 213px;
                    }
                    .kv-reqd {
                      color: red;
                      font-family: monospace;
                      font-weight: normal;
                    }
                    input .active{
                      color: #00E38C !important;
                    }
                    </style>

                    <!-- markup -->
                    <!-- note: your server code `/site/avatar_upload/1` will receive `$_FILES['avatar-1']` on form submission -->
                    <!-- the avatar markup -->
                    @yield('form')

                  </div>

                    </div>
                  </div>
                </div>
  </section>

   </div>
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
    <script src="{{ asset('js/index.j') }}s"></script>
    <script src=".{{ asset('js/mobileMenu.js') }}"></script>

    <script src="{{ asset('js-dash/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js-dash/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js-dash/chart.min.js') }}"></script>
    <script src="{{ asset('js-dash/chart-data.js') }}"></script>
    <script src="{{ asset('js-dash/easypiechart.js') }}"></script>
    <script src="{{ asset('js-dash/easypiechart-data.js') }}"></script>
    <script src="{{ asset('js-dash/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js-dash/custom.js') }}"></script>

    <script>
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>';
$("#avatar-1").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar">',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
</script>
<script type="text/javascript">
    //hamburger
  var card = document.getElementById('activator');
  var tl = gsap.timeline({defaults: {ease: "power2.inOut"}})

  var toggle = false;

  tl.to('.activator', {
      background: '#805ad5',
      'borderRadius': '5em 0 0 5em'
  });
  tl.to('nav', {
      'clipPath': 'ellipse(100% 100% at 50% 50%)'
  }, "-=.5")
  tl.to('nav img', {
      opacity: 1,
      transform: 'translateX(0)',
      stagger: .05
  }, "-=.5")
  tl.pause();

  card.addEventListener('click', () => {
      toggle = !toggle;
      if (toggle ? tl.play() : tl.reverse());
  })
</script>

</body>
 <script src="{{ asset('js-css-reservation/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js-css-reservation/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js-css-reservation/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

  <!--  Plugin for the Wizard -->
  <script src="{{ asset('js-css-reservation/js/demo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js-css-reservation/js/reservation.js') }}" type="text/javascript"></script>

  <!--  More information about jquery.validate here: https://jqueryvalidation.org/   -->
  <script src="{{ asset('js-css-reservation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
</html>
