@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>monkoli-login</title>
@endsection
@section('main')
    <!--inscription main content-->
    <br>
    <br>
    <br>
    <br>
    
    <section class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="center-screen">
                <div class="row main">
                    <div class=" col-12 col-md-12 col-lg-5 sidepartleft">
                        <img src="{{ asset('images/logo.png') }}" class="sidelogo" alt="logo">
                         <h2 style="color: #00E38C;" >MonKoli</h2>
                         <h6 style="color: white;">Expédier un colis n'a jamains été si <span style="color: #00E38C;">facile</span></h6>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7 sidepartrigth" >
                        <h1 style="font-size: large; font-weight: bold;">Connexion</h1>
                        <div class="wrap-input100 validate-input">
                            <input class="input100 form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input type="password" name="password" placeholder="Mot de passe" class="input100 form-control @error('password') is-invalid @enderror"  required autocomplete="current-password">
                            <span class="focus-input100"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span  style="color: #00E38C; font-size: xx-small; float: right;">Mot de passe oublié?</span>
                        <br>
                         <span style="font-size: xx-small; color: #C6C2C2; float: left;" ><input type="checkbox" name="" id=""  autocomplete="off"> Garder ma session active </span>

                        <br/>
                        <button style="width: 100%;" type="submit" class="btn vert pure-material-button-contained">SE CONNECTER</button>
                        <br/>
                        <br/>
                        <span style="font-size: small;color: #C6C2C2;">------------ OU -----------</span>
                        <br/>
                        <br/>
                        <button style="width: 100%;" type="button" class="btn bl  pure-material-button-contained"><i style="color:white;" class="fa fa-facebook-square" aria-hidden="true"></i>  CONTINUER AVEC FACEBOOK</button>
                        <br/>
                        <br/>
                        <button style="width: 100%;" type="button" class="btn  bl1 pure-material-button-contained"> CONTINUER AVEC GOOGLE</button>
                        <br/>
                        <br/>
                        <br/>
                         <span style="font-size: xx-small; color:#C6C2C2;font-weight: bolder;">Vous n'avez pas compte?  <span style="color: #00E38C;" > Inscrivez-vous <a href="{{ route('register') }}">ici</a> </span></span>
                         <br/>
                        <br/>
                        <br/>


                    </div>
                </div>

            </div>
        </form>

    </section>
@endsection






    <!--js part
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="../js/mobileMenu.js"></script>
</body>
</html>-->
