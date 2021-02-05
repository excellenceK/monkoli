@extends('layouts.app-profile')
@section('form')
<div class="col-lg-8">
    <form class="form form-vertical" enctype="multipart/form-data">
     <div class="row">
         <div class="col-sm-12 text-center">
         <h4>Avis utilisateurs</h4><br>
         <h6><span>Consultez la liste des avis reçus des expéditeurs et celle de vos commentaires laissés aux transporteurs avec qui vous avez été en contact lors d'une expédition </span></h6></div>
         <div class="col-sm-12">
           <div class="row">
                 <div class="col-sm-6">
                     <br>
                 </div>
             </div>
           <div class="row">
             <div class="col-sm-12">
                 <div class="panel panel-default articles">
                   <div class="panel-heading">
                     <h4 style="font-size: smaller;">Avis reçus des expéditeurs <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fas fa-sort-down"></em></span></h4>
                     </div>
                   <div class="panel-body articles-container" style="max-height: 400px; overflow: auto; border: 1px solid #C6C2C2; padding: 11px;">
                     <div class="article border-bottom">
                       <div class="col-xs-12">
                         <div class="row">
                           <div class="col-xs-2 col-md-2 date">
                             <div class="large">30</div>
                             <div class="text-muted">Jun</div>
                           </div>
                           <div class="col-xs-10 col-md-10">
                             <h5><a href="#">Samuel Monkoli</a></h5>
                             <h6><a href="#">Abidjan <i class="fa fa-arrow-right"></i> Paris</a></h6>
                             <p>Très professionnel comme transporteur. J'ai reçu mon colis en toute intégrité. Merci à la team Monkoli pour l'appli.</p>
                           </div>
                         </div>
                       </div>
                       <div class="clear"></div>
                     </div><!--End .article-->

                     <div class="article border-bottom">
                       <div class="col-xs-12">
                         <div class="row">
                           <div class="col-xs-2 col-md-2 date">
                             <div class="large">28</div>
                             <div class="text-muted">Jun</div>
                           </div>
                           <div class="col-xs-10 col-md-10">
                             <h5><a href="#">Samuel Monkoli</a></h5>
                             <h6><a href="#">Abidjan <i class="fa fa-arrow-right"></i> Paris</a></h6>
                             <p>Très professionnel comme transporteur. J'ai reçu mon colis en toute intégrité. Merci à la team Monkoli pour l'appli.</p>
                           </div>
                         </div>
                       </div>
                       <div class="clear"></div>
                     </div><!--End .article-->

                     <div class="article">
                       <div class="col-xs-12">
                         <div class="row">
                           <div class="col-xs-2 col-md-2 date">
                             <div class="large">24</div>
                             <div class="text-muted">Jun</div>
                           </div>
                           <div class="col-xs-10 col-md-10">
                             <h5><a href="#">Samuel Monkoli</a></h5>
                             <h6><a href="#">Abidjan <i class="fa fa-arrow-right"></i> Paris</a></h6>
                             <p>Très professionnel comme transporteur. J'ai reçu mon colis en toute intégrité. Merci à la team Monkoli pour l'appli.</p>
                         </div>
                       </div>
                       <div class="clear"></div>
                     </div><!--End .article-->
                   </div>
                 </div>

                 <br><br>
             </div>
                    <div class="panel panel-default articles" >
                     <div class="panel-heading">
                      <h4 style="font-size: smaller;">Avis laissés aux transporteurs <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fas fa-sort-down"></em></span></h4>
                     </div>
                   <div class="panel-body articles-container" style="max-height: 400px; overflow: auto; border: 1px solid #C6C2C2; padding: 11px;">
                     <div class="article border-bottom">
                       <div class="col-xs-12">
                         <div class="row">
                           <div class="col-xs-2 col-md-2 date">
                             <div class="large">30</div>
                             <div class="text-muted">Jun</div>
                           </div>
                           <div class="col-xs-10 col-md-10">
                             <h5><span>À: </span><a href="#">Thierry Monkoli</a></h5>
                             <h6><a href="#">Abidjan <i class="fa fa-arrow-right"></i> Paris</a></h6>
                             <p>Très professionnel comme transporteur. J'ai reçu mon colis en toute intégrité. Merci à la team Monkoli pour l'appli.</p>
                           </div>
                         </div>
                       </div>
                       <div class="clear"></div>
                     </div><!--End .article-->

                     <div class="article border-bottom">
                       <div class="col-xs-12">
                         <div class="row">
                           <div class="col-xs-2 col-md-2 date">
                             <div class="large">28</div>
                             <div class="text-muted">Jun</div>
                           </div>
                           <div class="col-xs-10 col-md-10">
                             <h5><span>À: </span><a href="#">Thierry Monkoli</a></h5>
                             <h6><a href="#">Abidjan <i class="fa fa-arrow-right"></i> Paris</a></h6>
                             <p>Très professionnel comme transporteur. J'ai reçu mon colis en toute intégrité. Merci à la team Monkoli pour l'appli.</p>
                           </div>
                         </div>
                       </div>
                       <div class="clear"></div>
                     </div><!--End .article-->

                     <div class="article">
                       <div class="col-xs-12">
                         <div class="row">
                           <div class="col-xs-2 col-md-2 date">
                             <div class="large">24</div>
                             <div class="text-muted">Jun</div>
                           </div>
                           <div class="col-xs-10 col-md-10">
                             <h5><span>À: </span><a href="#">Thierry Monkoli</a></h5>
                             <h6><a href="#">Abidjan <i class="fa fa-arrow-right"></i> Paris</a></h6>
                             <p>Très professionnel comme transporteur. J'ai reçu mon colis en toute intégrité. Merci à la team Monkoli pour l'appli.</p>
                         </div>
                       </div>
                       <div class="clear"></div>
                     </div><!--End .article-->
                   </div>
                 </div>

                 <br><br>
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
