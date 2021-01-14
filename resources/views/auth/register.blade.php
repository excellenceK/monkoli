@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
    <title>monkoli-inscription</title>
@endsection

@section('main')
<section class="container">
    <form action="">
        <div class="center-screen">
            <div class="row main">
                <div class="col-lg-5 sidepartleft">
                    <img src="../images/logo.png" class="sidelogo" alt="logo">
                     <h2 style="color: #00E38C;" >MonKoli</h2>
                     <h6 style="color: white;">Expédier un colis n'a jamains été si <span style="color: #00E38C;">facile</span></h6>
                </div>
                <div class="col-lg-7 sidepartrigth" >
                    <h1 style="font-size: large; font-weight: bold;">Inscrivez-vous</h1>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nom" placeholder="Nom">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="prenom" placeholder="Prenm">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Mot de passe">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="cpassword" placeholder="Confirmation du mot de passe">
                        <span class="focus-input100"></span>
                    </div>
                    <br/>
                    <button style="width: 100%;" type="button" class="btn vert pure-material-button-contained">S'INSCRIRE</button>
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
                     <span style="font-size: xx-small; color:#C6C2C2;font-weight: bolder;">Vous avez déjà un compte?  <span style="color: #00E38C;" > connectez-vous</span> </span>
                     <br/>
                    <br/>
                    <br/>


                </div>
            </div>

        </div>
    </form>

</section>
@endsection
    <!--inscription main content-->
