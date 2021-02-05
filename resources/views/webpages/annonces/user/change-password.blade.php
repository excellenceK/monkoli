@extends('layouts.app-profile')
@section('form')
<div class="col-lg-8">
    <form class="form form-vertical" action="/site/avatar-upload/1" method="post" enctype="multipart/form-data">
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
                         <input type="password" class="form-control" name="old-password" id="pass" required>
                         <input type="checkbox" onclick="showPassword()"> Afficher mot de passe
                     </div>
                 </div>
               <div class="col-sm-12">
                     <div class="form-group">
                         <label for="new-password">Nouveau mot de passe</label>
                         <input type="password" class="form-control" name="new-password" id="pass1" required>
                         <input type="checkbox" onclick="showPassword1()"> Afficher mot de passe
                     </div>
                 </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                         <label for="check-password">Confirmer le Nouveau mot de passe</label>
                         <input type="password" class="form-control" name="check-password" id="pass2" required>
                         <input type="checkbox" onclick="showPassword2()"> Afficher mot de passe
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

 </div>
@endsection
