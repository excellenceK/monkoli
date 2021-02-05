@extends('layouts.app-profile')
@section('form')
<div class="col-lg-8">
    <form class="form form-vertical" action="" method="post" enctype="multipart/form-data">
     <div class="row">
         <div class="col-sm-1 text-center">

         </div>
         <div class="col-sm-11">
           <div class="row">
             <div class="col-sm-12">
               <div class="form-group">
                 <h4><label for="typeNotif">Suppression du compte</label></h4>
                 <p><span>Pourquoi voulez-vous supprimer votre compte ?</span></p>
               </div>
             </div>
             <div class="col-sm-12">
               <div class="form-group">
                   <label for="raison"><h5>Motif</h5></label>
                   <br>
                   <textarea type="text" class="form-control" name="raison" required></textarea>
               </div>
             </div>
           </div>

             <div class="form-group">
                 <hr>
                 <div class="text-left">
                     <button type="submit" class="btn pure-material-button-contained" style="background-color: red"><i class="fa fa-trash" style="color: #FFF; opacity: 0.7;"></i> Supprimer</button>
                 </div>
             </div>
         </div>
     </div>
   </form>
   <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>

   <!-- the fileinput plugin initialization -->

 </div>
@endsection
