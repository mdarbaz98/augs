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

  // post active table of content

  var i = 0;
  $(".blog-body h2").each(function () {
    ++i;
    $(this).attr("id", "h" + i);
    if (i == 1) {
      var status = "active";
    } else {
      var status = "";
    }
    $("#table-of-content,#table-of-content-for-mobile").append(
      `<li onclick="scrollToElement('h${i}')" class="tbc_links ${status}" id>
        <a
          ><span>${i}.</span>
          ${$(this).html()}</a
        >
      </li>`
    );

    $("#table-of-content strong").contents().unwrap();
  });

  //sticky TBC for mobile
  $(window).scroll(function () {
    if ($(this).scrollTop() > 400) {
      $(".mobile-tbc").addClass("sticky_accordion");
    } else {
      $(".mobile-tbc").removeClass("sticky_accordion");
    }
  });

  // auto close accordion of post page
  $("#table-of-content-for-mobile .tbc_links").click(function () {
    $(".post-sticky-accordion-btn").click();
  });
  // search filter js
  $(".search-input").on("keyup", function () {
    var value = $(this).val().toLowerCase();
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
  $(".moretext").toggle();
  if ($(".moreless-button").text() == "Read more") {
    $(this).text("Read less...");
  } else {
    $(this).text("Read more");
  }
});

// category product show and hide content 
$(".categorysection1_inside2 h2").eq(1).next().nextAll().addClass('moretext')
