// smoothscroll fucntion
function scrollToElement(elementId) {
  const yOffset = -150;
  var element = document.getElementById(elementId);
  const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
  window.scrollTo({ top: y, behavior: "smooth" });
}

$(document).ready(function () {
  // header js
  $(".menu-open-btn").click(function () {
    $(".side_Bar").animate({ left: "0px" }, 400);
    $(".overlay_Div").animate({ left: "0%" }, 0);
    $("body,html").css({ "overflow-y": "hidden" });
  });
  $(".menu-close-btn,.overlay_Div").click(function () {
    $(".side_Bar").animate({ left: "-300px" }, 500);
    $(".overlay_Div").animate({ left: "-100%" }, 0);
    $("body,html").css({ "overflow-y": "scroll" });
  });

  // owl btn inner icon
  $(".owl-carousel .owl-next span").html(
    `<i class="fa-solid fa-arrow-right"></i>`
  );
  $(".owl-carousel .owl-prev span").html(
    `<i class="fa-solid fa-arrow-left"></i>`
  );

  //sticky TBC for mobile
  $(window).scroll(function () {
    if ($(this).scrollTop() > 400) {
      $(".mobile-tbc").addClass("sticky_accordion");
    } else {
      $(".mobile-tbc").removeClass("sticky_accordion");
    }
  });

  // search filter js
  $(".search-input").on("keyup", function (event) {
    var value = $(this).val().toLowerCase();
    if (event.keyCode == 13) {
      window.location.href = "http://localhost/augs/search.php?q=" + value;
    }
    if (value) {
      $(".autoCom-Box").show();
      $(".autoCom-Box li").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    } else {
      $(".autoCom-Box").hide();
    }
  });
});

// readmore
$(".moreless-button").click(function () {
  $(".moretext").fadeToggle("slow");
  if ($(".moreless-button").text() == "Read less") {
    $(this).text("Read more...");
  } else {
    $(this).text("Read less");
  }
});

// category product show and hide content
$(".categorysection1_inside2 h2").eq(1).next().nextAll().addClass("moretext");

// post active table of content
var i = 0;
$(".blog-body h2").each(function () {
  ++i;
  $(this).addClass("heading");
  $(this).attr("id", "h" + i);
  if (i == 1) {
    var status = "active";
  } else {
    var status = "";
  }
  $("#table-of-content").append(
    `<li onclick="scrollToElement('h${i}')" class="tbc_links ${status}">
    <a
      ><span>${i}.</span>
      ${$(this).html()}</a
    >
  </li>`
  );
  // loadBlogScrollJs();
  $("#table-of-content strong").contents().unwrap();
});

// append all h2 in mobile ul
var j = 0;
$(".blog-body h2").each(function () {
  ++j;
  if (j == 1) {
    var status = "active";
  } else {
    var status = "";
  }
  $("#table-of-content-for-mobile").append(
    `<li onclick="scrollToElement('h${j}')" class="mobile_tbc_links ${status}">
    <a
      ><span>${j}.</span>
      ${$(this).html()}</a
    >
  </li>`
  );
  $("#table-of-content strong").contents().unwrap();
});

$(window)
  .scroll(function () {
    var scrollDistance = $(window).scrollTop();
    $(".heading").each(function (i) {
      if ($(this).position().top - 190 <= scrollDistance) {
        $(".tbc_links.active").removeClass("active");
        $(".tbc_links").eq(i).addClass("active");
      }
    });
  })
  .scroll();

// read more index

var value = false;
$(".read-more-btn").click(function () {
  value = !value;
  totalHeight = 0;
  $(".sidebar-box")
    .children()
    .each(function () {
      totalHeight = totalHeight + $(this).height() + 32;
    });
  if (value) {
    $(this).text("Read less...");
    $(this).removeClass("shad-btn");
    $(".sidebar-box").animate({ height: totalHeight });
  } else {
    $(this).text("Read more...");
    $(this).addClass("shad-btn");
    $(".sidebar-box").css({ height: "550px" });
  }
});
// mobile tbc close after click
$(".mobile_tbc_links").click(function () {
  $(".mobile_tbc_links").removeClass("active");
  $(this).addClass("active");
  $(".post-sticky-accordion-btn").click();
});

$('.header-btn-2').click(function(){
  $('.search-input,.header-search-btn').hide();
  $('.header-btn-1').show();
  $(this).hide();
})

$('.header-btn-1').click(function(){
  $('.search-input,.header-search-btn').show();
  $(this).hide();
  $('.header-btn-2').show()
});

function viewMoreblog(x,cat_id){
  alert(cat_id)
  var id = $(x).attr('data-id');
  alert(id);
        $.ajax({
        type: "POST",
        url: "action.php",
        dataType: 'json',
        data: {
            post_id: id,
            btn: 'post_id',
        },
        // beforeSend: function(){$(".tabs-section").css('opacity', 0.5)
        //                           $(".loading").show()},
        success: function (data) {
            var json = $.parseJSON(JSON.stringify(data));
	        var lastId = json.last_id;
         var htmldata =json.datahtml;
            alert(htmldata);
            console.log(htmldata);

            $('#viewpost').attr('data-id',lastId);
            $("#postAjaxdata").append(htmldata);
          //   blogs();

            // $(".tabs-section").css('opacity', 1)
            // $(".loading").hide()
        }

        });
}