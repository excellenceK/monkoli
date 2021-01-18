$(document).ready(function () {
    var choix=1;

$('[data-toggle="popover"]').popover();

 $(function () {
 $('.example-popover').popover({
 container: 'body'
 })
 })

 $(function() {
 function reposition() {
 var modal = $(this),
 dialog = modal.find('.modal-dialog');
 modal.css('display', 'block');
 dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
 }

 $('.modal').on('show.bs.modal', reposition);

 $(window).on('resize', function() {
 $('.modal:visible').each(reposition);
 });
 });
 $('#myModal').modal({
    focus:true,
    show:true,
});

//radio btn
var radio1=$('#customRadio1');
var radio2=$('#customRadio2');
var radio3=$('#customRadio3');

radio1.click(function(){
    radio1.addClass('active');
    radio2.removeClass('active');
    radio3.removeClass('active');
    choix=1;
});
radio2.click(function(){
    radio2.addClass('active');
    radio1.removeClass('active');
    radio3.removeClass('active');
    choix=2;

});
radio3.click(function(){
    radio3.addClass('active');
    radio1.removeClass('active');
    radio2.removeClass('active');
    choix=3;

});


//gestion de l'affiche du formulaire en fonction du choix utilisateur
var validebtn=$('#vbtn');
validebtn.click(function(){

  switch (choix) {
      case 1:
          //formulaire d'expédition de colis
           $('#typeannonce').css({
               'display':'none'
           });
           $('#catégorie').css({
            'display':'block'
        })


          break;
      case 2:
          //formulaire de vente/location d'appartement
          break;
      case 3:
        //formulaire de vente/location de voiture

          break;

      default:
        alert("Merci de choisir une option");
          break;
  }

});



});
