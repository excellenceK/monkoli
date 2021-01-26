
$(document).ready(function(){
    //carousel setup
    var owl= $(".owl-carousel");
    $(".owl-carousel").owlCarousel({
        autoplay:true,  
        nav:false,
        dots:true,
        loop: true,
        center: false,
        rewind: false,
    
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        freeDrag: false,
    
        margin: 0,
        stagePadding: 0,

    
        startPosition: 0,
        rtl: false,
        fluidSpeed: true,
        dragEndSpeed: false,

        responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
      });

  if($('.navbar-toggle').is(':visible')){
    $('.prev').css({
        'display':'none',
    })
   // console.log("mobile");
   
  }

  $(".navnext").click(function() {
    owl.trigger('next.owl.carousel',[300]);
    console.log("ok");
  });
  $(".navprev").click(function() {
    owl.trigger('prev.owl.carousel',[300]);
  });

  

  

  
});
/*
$(".owl-carousel").owlCarousel({
    autoplay:true,  
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    nav:false,
    dots:true,
    loop: true,
    center: false,
    rewind: false,

    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    freeDrag: false,

    margin: 0,
    stagePadding: 0,

    merge: false,
    mergeFit: true,
    autoWidth: false,

    startPosition: 0,
    rtl: false,
    fluidSpeed: true,
    dragEndSpeed: false,
    
  });
*/