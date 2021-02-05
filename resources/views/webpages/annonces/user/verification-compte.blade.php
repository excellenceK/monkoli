@extends('layouts.app-profile')
@section('form')
<div class="col-lg-8">
    <form class="form form-vertical" enctype="multipart/form-data">
     <div class="row">
         <div class="col-sm-12 text-center">
         <h4><label for="typeColis">Vérification</label></h4><br>
         <h6><span>La vérification de vos informations de profil nous permettra de garantir aux expéditeurs que vous êtes un utilisateur de confiance. Ceci aura pour avantage de trouver plus aisément des expéditeurs et même d'autres tranporteurs</span></h6></div>
         <div class="col-sm-12">
           <div class="row">
                 <div class="col-sm-6">
                     <br>
                 </div>
             </div>
           <div class="row">
                 <div class="col-sm-12">
                     <form action="" method="">
                        <div class="form-group">
                       <h5><span>Email </span><i class="fas fa-envelope"></i></h5>
                       <p><span>La confirmation de votre adresse email est nécéssaire pour vous assurer de recevoir les notifications et ainsi rester en contact avec les expéditeurs et transporteurs en toute sécurité.</span></p>
                       <div class="row">
                         <div class="col-sm-4">
                           <h6><span>Email renseigné :</span></h6>
                         </div>
                         <div class="col-sm-8">
                           <h6><span>monkoli@monkoli.ci</span></h6>
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       <br>
                       <div class="text-left">
                         <button type="submit" class="btn vert pure-material-button-contained">Vérifier</button>
                       </div>
                     </div>
                     </form>

                     <br><br>
                 </div>

                 <div class="col-sm-12">
                     <div class="form-group">
                       <h5><span>Numéro de Téléphone </span><i class="fas fa-phone"></i></h5>
                       <p><span>En cliquant sur vérifier, vous recevrez un code par sms au numéro que vous avez enregistré sur notre plateforme pour confirmer votre numéro de téléphone.</span></p>
                     </div>
                     <div class="row">
                       <div class="col-sm-6">
                         <div class="form-group">
                       <br>
                       <div class="text-left">
                         <button type="submit" class="btn vert pure-material-button-contained">Envoyer le code</button>
                       </div>
                     </div>
                   </div>
                     <div class="col-sm-6">
                         <div class="form-group">
                       <br>
                       <div class="text-left">
                         <form class="otc" name="one-time-code" action="#">
                           <fieldset>
                             <div>
                               <!-- https://developer.apple.com/documentation/security/password_autofill/enabling_password_autofill_on_an_html_input_element -->
                               <input class="code" type="text" pattern="[0-9]*"  value="" inputtype="numeric" autocomplete="one-time-code" id="otc-1" required>
                               <!-- Autocomplete not to put on other input -->
                               <input class="code" type="text" pattern="[0-9]*"  value="" inputtype="numeric" id="otc-2" required>
                               <input class="code" type="text" pattern="[0-9]*"  value="" inputtype="numeric" id="otc-3" required>
                               <span>&nbsp;&nbsp;-&nbsp;&nbsp;</span>
                               <input class="code" type="text" pattern="[0-9]*"  value="" inputtype="numeric" id="otc-4" required>
                               <input class="code" type="text" pattern="[0-9]*"  value="" inputtype="numeric" id="otc-5" required>
                               <input class="code" type="text" pattern="[0-9]*"  value="" inputtype="numeric" id="otc-6" required>
                             </div>
                           </fieldset>
                             <br>
                             <div class="text-left">
                               <button type="submit" class="btn vert pure-material-button-contained">Vérifier</button>
                             </div>

                         </form>
                       </div>
                     </div>
                       </div>
                     </div>
                     <br><br>
               </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                       <h5><span>Joinger une pièce d'identité </span><i class="fas fa-id-card"></i></h5>
                       <p><span>La vérification de vos informations de profil nous permettra de garantir aux expéditeurs que vous êtes un utilisateur de confiance. Ceci aura pour avantage de trouver plus aisément des expéditeurs et même d'autres tranporteurs</span></p>
                     </div>
                     <div class="form-group">
                       <br>
                       <div class="text-left">
                         <input name="" type="file" class="form-control  pure-material-button-contained" accept="image/jpeg, image/png, application/pdf" style="padding: 6px;"></input>
                       </div>
                     </div>
                     <br><br>
                 </div>
               </div>

             <div class="form-group">
                 <br>
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
