@extends('layouts.app-profile')
@section('form')
<div class="col-lg-8">
    <form class="form form-vertical" action="/site/avatar-upload/1" method="post" enctype="multipart/form-data">
     <div class="row">
         <div class="col-sm-3 text-center">

         </div>
         <div class="col-sm-9">
           <div class="row">
           <div class="col-sm-12">
             <div class="form-group">
                 <h4><label for="typeColis">Type de Colis pris en charge</label></h4><br>
                 <h6><span>Choississez les catégories de colis que vous voulez transporter. Ceux-ci seront afficher aux potentiels exportateur de colis.</span></h6></div>
             </div>
             <div class="col-sm-6">
                 <div>
                     <label><input type="checkbox" name="typeColis" checked class="active"> Enveloppes</label><br><br>
                     <label><input type="checkbox" name="typeColis" > Sac Pleins</label><br><br>
                     <label><input type="checkbox" name="typeColis" > Paquets</label><br><br>


                 </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                       <label><input type="checkbox" name="typeColis" > Liquides</label><br><br>
                       <label><input type="checkbox" name="typeColis" > Nourriture</label><br><br>
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
