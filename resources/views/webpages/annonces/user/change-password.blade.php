@extends('layouts.app-profile')
@section('form')
<div class="col-lg-8">
    <form class="form form-vertical" action="{{ route('users.changePassword') }}" method="post" enctype="multipart/form-data">
        @csrf
     <div class="row">
         <div class="col-sm-1 text-center">

         </div>
         <div class="col-sm-11">
           <div class="row">
             <div class="col-sm-12">
               <div class="form-group">
                   <h4><label for="typeNotif">Modifier votre mot de passe</label></h4>
                   <p><span>Pour des raisons de sécurité de votre compte, un mot de passe contenant au moins 8 caractère est requis.</span></p></div>
               </div>
                 <div class="col-sm-12">
                     <div class="form-group">
                         <label for="old-password">Mot de passe actuel</label>
                         <input type="password" class="form-control" name="old-password" id="pwd" required>
                         <input type="checkbox" onclick="showHide()" id="eye"> Afficher mot de passe
                     </div>
                 </div>
               <div class="col-sm-12">
                     <div class="form-group">
                         <label for="new-password">Nouveau mot de passe</label>
                         <input type="password" class="form-control" name="new-password" id="pass1" required>
                         <input type="checkbox" onclick="showHide()" id="eye1"> Afficher mot de passe
                     </div>
                 </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                         <label for="check-password">Confirmer le Nouveau mot de passe</label>
                         <input type="password" class="form-control" name="check-password" id="pass2" required>
                         <input type="checkbox" onclick="showHide()" id="eye2"> Afficher mot de passe
                     </div>
                 </div>
               </div>

             <div class="form-group">
                 <hr>
                 <div class="text-right">
                     <button type="submit" class="btn vert pure-material-button-contained">Enregister</button>
                 </div>
             </div>
         </div>
     </div>
   </form>
   <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>

   <!-- the fileinput plugin initialization -->

   <script>
       function show()
        {
            var p = document.getElementById('pwd');

            p.setAttribute('type','text');
        }
        function show1()
        {
            var p2 = document.getElementById('pass1');

            p2.setAttribute('type','text');
        }

        function show2()
        {
            var p3 = document.getElementById('pass2');

            p3.setAttribute('type','text');
        }

        function hide()
        {
            var p = document.getElementById('pwd');
            p.setAttribute('type','password');
        }
        function hide1()
        {
            var p2 = document.getElementById('pass1');
            p2.setAttribute('type','password');

        }
        function hide2()
        {
            var p3 = document.getElementById('pass2');
            p3.setAttribute('type','password');

        }

        function showHide()
        {
            var pwShown = 0;
            var eye = document.getElementById("eye");
            eye.addEventListener("click", function() {
                if (eye.checked == true)
                {
                    pwShown = 1;
                    show();
                }
                else
                {
                    pwShow = 0;
                    hide();
                }

            }, false);
            var eye1 = document.getElementById("eye1");
            eye1.addEventListener("click", function() {
                if (eye1.checked == true)
                {
                    pwShown = 1;
                    show1();
                }
                else
                {
                    pwShow = 0;
                    hide1();
                }

            }, false);

            var eye2 = document.getElementById("eye2");
            eye2.addEventListener("click", function() {
                if (eye2.checked == true)
                {
                    pwShown = 1;
                    show2();
                }
                else
                {
                    pwShow = 0;
                    hide2();
                }

            }, false);

        }
   </script>

 </div>
@endsection
