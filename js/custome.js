// smoothscroll fucntion
function scrollToElement(elementId) {
  const yOffset = -150
  var element = document.getElementById(elementId)
  const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset
  window.scrollTo({ top: y, behavior: 'smooth' })
}

$(document).ready(function () {
  // header js
  $('.menu-open-btn').click(function () {
    $('.side_Bar').animate({ left: '0px' }, 400)
    $('.overlay_Div').animate({ left: '0%' }, 0)
    $('body,html').css({ 'overflow-y': 'hidden' })
  })
  $('.menu-close-btn,.overlay_Div').click(function () {
    $('.side_Bar').animate({ left: '-300px' }, 500)
    $('.overlay_Div').animate({ left: '-100%' }, 0)
    $('body,html').css({ 'overflow-y': 'scroll' })
  })

  // owl btn inner icon
  $('.owl-carousel .owl-next span').html(
    `<i class="fa-solid fa-arrow-right"></i>`,
  )
  $('.owl-carousel .owl-prev span').html(
    `<i class="fa-solid fa-arrow-left"></i>`,
  )

  //sticky TBC for mobile
  $(window).scroll(function () {
    if ($(this).scrollTop() > 400) {
      $('.mobile-tbc').addClass('sticky_accordion')
    } else {
      $('.mobile-tbc').removeClass('sticky_accordion')
    }
  })

  // auto close accordion of post page
  $('#table-of-content-for-mobile .tbc_links').click(function () {
    $('.post-sticky-accordion-btn').click()
  })
  // search filter js
  $('.search-input').on('keyup', function (event) {
    var value = $(this).val().toLowerCase()
    if (event.keyCode == 13) {
      window.location.href = 'http://localhost/augs/search.php?q=' + value
    }
    if (value) {
      $('.autoCom-Box').show()
      $('.autoCom-Box li').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      })
    } else {
      $('.autoCom-Box').hide()
    }
  })
})

// readmore
$('.moreless-button').click(function () {
  $('.moretext').fadeToggle("slow");
  if ($('.moreless-button').text() == 'Read less') {
    $(this).text('Read more...');
  } else {
    $(this).text('Read less');
  }
})

// category product show and hide content
$('.categorysection1_inside2 h2').eq(1).next().nextAll().addClass('moretext')

// post active table of content
var i = 0
$('.blog-body h2').each(function () {
  ++i
  $(this).addClass('heading')
  $(this).attr('id', 'h' + i)
  if (i == 1) {
    var status = 'active'
  } else {
    var status = ''
  }
  $('#table-of-content,#table-of-content-for-mobile').append(
    `<li onclick="scrollToElement('h${i}')" class="tbc_links ${status}">
    <a
      ><span>${i}.</span>
      ${$(this).html()}</a
    >
  </li>`,
  )
  // loadBlogScrollJs();
  $('#table-of-content strong').contents().unwrap()
})

$('.tbc_links').click(function () {
  $('.tbc_links').removeClass('active')
  $(this).addClass('active')
})

// add active class on scroll
// function loadBlogScrollJs() {
//   $(window).scroll(function () {
//     const headingElement = document.querySelectorAll('.tbc_links')
//     const headingSections = document.querySelectorAll('.blog-body h2')
//     const arrayForm = Array.from(headingElement)

//     let len = headingSections.length

//     while (--len && window.scrollY + 197 < headingSections[len].offsetTop) {}
//     // arrayForm.forEach((ele) => {
//     //   ele.classList.remove("active");
//     // });
//     // arrayForm[len].classList.add("active");

//     console.log(arrayForm[len])
//   })
// }


// $(window).scroll(function() {
//   var scrollDistance = $(window).scrollTop();

//   // Show/hide menu on scroll
//   //if (scrollDistance >= 850) {
//   //		$('nav').fadeIn("fast");
//   //} else {
//   //		$('nav').fadeOut("fast");
//   //}
//   // $('.tbc_links').addClass('active');
//   // Assign active class to nav links while scolling
//   $('.heading').each(function(i) {
//       if ($(this).position().top <= scrollDistance) {
//         $('.tbc_links.active').removeClass('active');
//         $('.tbc_links').eq(i).addClass('active');
//       }
//       console.log($('.tbc_links'));
//   });

// }).scroll();

// read more index

var value = false;
$('.read-more-btn').click(function(){
  value = !value;
  totalHeight=0;
  $('.sidebar-box').children().each(function(){
    totalHeight = totalHeight + $(this).height() + 16;
  });
  if(value){
    $(this).text("Read less...");
  $(this).removeClass('shad-btn');
  $('.sidebar-box').animate({height: totalHeight});
  }else{
    $(this).text("Read more...");
  $(this).addClass('shad-btn');
  $('.sidebar-box').css({'height':'950px'});
  }
})