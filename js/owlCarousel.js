$('#home-owl-carousel,#product-owl-carousel,#categoryproduct-owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1.3
        },
        600:{
            items:3
        },
        1000:{
            items:3.5
        }
    }
})


// readmore
$(document).ready(function(){
    $("#hidden").click(function(){
    //   $("#div1").fadeIn();
      $("#hiddencontent").fadeIn("slow");
    //   $("#div3").fadeIn(3000);
    });
  });