$(document).ready(function () {
  // header js
  $('.menu-open-btn').click(function() {
    $(".side_Bar").animate({ left: "0px" }, 400);
      $(".overlay_Div").animate({ left: "0%" }, 0);
      $('body').css({'overflow-y': 'hidden'})
  })
  $('.menu-close-btn,.overlay_Div').click(function() {
    $(".side_Bar").animate({ left: "-300px" }, 500);
    $(".overlay_Div").animate({ left: "-100%" }, 0);
    $('body').css({'overflow-y': 'scroll'})
  })

  // owl inner icon
  $(".owl-carousel .owl-next span").html(
    `<i class="fa-solid fa-arrow-right"></i>`
  );
  $(".owl-carousel .owl-prev span").html(
    `<i class="fa-solid fa-arrow-left"></i>`
  );
});
