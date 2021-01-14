$(document).ready(function () {
    //mobile navigation menu 
  var header=$('#hmobile');
  var iconHamburger=$('#hamburgerBtn');
  var mobileMenu=$('#mobileMenu');
  var icoMobileClose=$('#close');

  iconHamburger.click(function(){
    iconHamburger.css({
      'display':'none'
    });
    header.addClass("mob");
    mobileMenu.css({
        'display':'block'
    });
    
  });
  icoMobileClose.click(function(){
    mobileMenu.css({
        'display':'none'
    });
    header.removeClass("mob");
    iconHamburger.css({
        'display':'block'
      });

  });

  //gestion menu desktop
  $('#2').click(function(){
    $('#itm a').removeClass("active");
    $('#2').addClass("active");
});

$('#1').click(function(){
  $('#itm a').removeClass("active");
  $('#1').addClass("active");
});

$('#3').click(function(){
  $('#itm a').removeClass("active");
  $('#3').addClass("active");
});
$('#4').click(function(){
  $('#itm a').removeClass("active");
  $('#4').addClass("active");
});
$('#5').click(function(){
  $('#itm a').removeClass("active");
  $('#5').addClass("active");
});
$('#6').click(function(){
  $('#itm a').removeClass("active");
  $('#6').addClass("active");
});
$('#7').click(function(){
  $('#itm a').removeClass("active");
  $('#7').addClass("active");
});

});