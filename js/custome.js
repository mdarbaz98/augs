// header js
$(document).ready(function(){
    var i = 0;
    $('.menu-open-btn').click(function(){
        i++;
        if(i%2 == 0){
            $('.side_Bar').animate({'left':'-300px'},500);
            $('.overlay_Div').animate({'left':'-100%'},400);
        } else{
            $('.side_Bar').animate({'left':'0px'},500);
            $('.overlay_Div').animate({'left':'0%'},400);
        }
    }
    );

    $('.overlay_Div').click(function(){
        alert('ok')
        $('.side_Bar').animate({'left':'-300px'},500);
            $('.overlay_Div').animate({'left':'-100%'},400);
    });

    $(body).css({'background':'red'});

    // $('.menu-close-btn').click(function(){
    //     $('.side_Bar').animate({'left':'-300px'},500);
    // });
});
// header js


$('.owl-carosel .owl-next span').html(`<i class="fa-solid fa-angle-right"></i>`);
$('.owl-carosel .owl-prev span').html(`<i class="fa-solid fa-angle-left"></i>`);