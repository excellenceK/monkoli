@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
    <title>monkoli-inscription</title>
@endsection

@section('main')
<br>
<br>
<br>
<section class="container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="center-screen">
            <div class="row main">
                <div class="col-12 col-md-12 col-lg-5 sidepartleft">
                    <img src="../images/logo.png" class=" img img-responsive sidelogo" alt="logo">
                     <h2 style="color: #00E38C;" >MonKoli</h2>
                     <h6 style="color: white;">Expédier un colis n'a jamains été si <span style="color: #00E38C;">facile</span></h6>
                </div>
                <div class="col-12 col-md-12  col-lg-7 sidepartrigth" >
                    <h1 style="font-size: large; font-weight: bold;">Inscrivez-vous</h1>
                    <div class="wrap-input100 validate-input">
                        <input id="name" class="input100 form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100 form-control" type="text" name="prenom" placeholder="Prenom"  value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100 form-control" type="text" name="telephone" placeholder="Telephone"  value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mot de passe" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input id="password-confirm" class="input100 form-control" type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                    </div>
                    <br/>
                    <button style="width: 100%;" type="submit" class="btn vert pure-material-button-contained">S'INSCRIRE</button>
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
                     <span style="font-size: xx-small; color:#C6C2C2;font-weight: bolder;">Vous avez déjà un compte?  <span style="color: #00E38C;" > <a href="{{ route('login') }}"> connectez-vous </a></span> </span>
                     <br/>
                </div>
            </div>

        </div>
    </form>

</section>
@endsection
    <!--inscription main content-->
