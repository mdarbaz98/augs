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

  // owl inner icon
  $('.owl-carousel .owl-next span').html(
    `<i class="fa-solid fa-arrow-right"></i>`,
  )
  $('.owl-carousel .owl-prev span').html(
    `<i class="fa-solid fa-arrow-left"></i>`,
  )

  // post active table of content

  var i = 0
  $('.blog-body h2').each(function () {
    ++i
    $(this).attr('id', 'h' + i)
    if (i == 1) {
      var status = 'active'
    } else {
      var status = ''
    }
    $('#table-of-content,#table-of-content-for-mobile').append(
      `<li onclick="scrollToElement('h${i}')" class="tbc_links ${status}" id>
        <a
          ><span>${i}.</span>
          ${$(this).html()}</a
        >
      </li>`,
    )

    $('#table-of-content strong').contents().unwrap()
  })

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
})

// readmore
$('.moreless-button').click(function () {
  $('.moretext').slideToggle()
  if ($('.moreless-button').text() == 'Read less') {
    $(this).text('Read more...')
  } else {
    $(this).text('Read less')
  }
<<<<<<< HEAD
});


const searchWrapper = document.querySelector(".header-form");
const inputBox = searchWrapper.querySelector(".search-input");
const suggBox = searchWrapper.querySelector(".autoCom-Box");
const icon = searchWrapper.querySelector(".header-search-btn");
let linkTag = searchWrapper.querySelector("a");
let webLink;

// if user press any key and release
inputBox.onkeyup = (e)=>{
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if(userData){
        icon.onclick = ()=>{
            webLink = "https://www.google.com/search?q=" + userData;
            linkTag.setAttribute("href", webLink);
            console.log(webLink);
            linkTag.click();
        }
        emptyArray = suggestions.filter((data)=>{
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
        });
        emptyArray = emptyArray.map((data)=>{
            // passing return data inside li tag
            return data = '<li>'+ data +'</li>';
        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "select(this)");
        }
    }else{
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
}

function select(element){
    let selectData = element.textContent;
    inputBox.value = selectData;
    icon.onclick = ()=>{
        webLink = "https://www.google.com/search?q=" + selectData;
        linkTag.setAttribute("href", webLink);
        linkTag.click();
    }
    searchWrapper.classList.remove("active");
}

function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = inputBox.value;
        listData = '<li>'+ userValue +'</li>';
    }else{
        listData = list.join('');
    }
    suggBox.innerHTML = listData;
}

let suggestions = [
    "CodingMak",
    "CodingMaker",
    "YouTube",
    "YouTube cod",
    "YouTube CodingMak",
    "YouTube CodingMaker",
    "YouTuber",
    "YouTube Channel",
    "Blogger",
    "Facebook",
    "Freelancer",
    "Facebook Page",
    "Developer",
    "Web Designer",
    "website Developer",
    "Login Form in HTML & CSS",
    "How to learn HTML & CSS",
    "How to learn JavaScript",
    "How to became Freelancer",
    "How to became Web Designer",
    "How to start Gaming Channel",
    "How to start YouTube Channel",
    "What does HTML stands for?",
    "What does CSS stands for?",
];
=======
})
>>>>>>> 9efc7739fab8e29bd0e3d4e34ddbbb978c6ba1e3
