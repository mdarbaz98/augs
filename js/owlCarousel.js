$(
  '#home-owl-carousel,#product-owl-carousel,#categoryproduct-owl-carousel,#post-owl-carousel',
).owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1.2,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3.5,
    },
  },
})

$('#post_cta_slider').owlCarousel({
  loop: true,
  margin: 5,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1,
      stagePadding: 5,
      margin: 10,
    },
    600: {
      items: 1.5,
    },
    1000: {
      items: 2,
    },
  },
})

var owl = $('.product-image')
owl.owlCarousel({
  loop: true,
  margin: 10,
  dots: false,
  autoplay: true,
  // slideSpeed: 100,
  slideTransition: 'linear',
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  items:1,
  smartSpeed: 670,
})


$('.img').on('mouseenter', function () {
  owl.trigger('play.owl.autoplay', [1000])
})
$('.img').on('mouseleave', function () {
  owl.trigger('stop.owl.autoplay')
})
