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
                 <h4><label for="typeNotif">Notifications</label></h4><br>
                 <h6><span>Choississez les catégories de colis que vous voulez transporter. Ceux-ci seront afficher aux potentiels exportateur de colis.</span></h6></div>
             </div>
              <div class="col-sm-6">
                 <div class="form-group">
                     <h5><label for="typeNotif">Message</label></h5>
                     <label><input type="checkbox" name="typeNotif" > Email</label><br><br>
                     <label><input type="checkbox" name="typeNotif" > Whatsapp</label><br><br>
                     <label><input type="checkbox" name="typeNotif" > SMS</label><br><br>
                 </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                     <h5><label for="typeNotif">Infos utilisées</label></h5>
                       <label for="email">Email</label>
                         <input type="text" class="form-control" name="email" readonly value="monkoli@monkoli.ci">
                       <br>
                       <label for="email">SMS / Whatsapp</label>
                         <input type="tel" class="form-control" name="sms" readonly value="+2250777443025">
                       <br>
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
