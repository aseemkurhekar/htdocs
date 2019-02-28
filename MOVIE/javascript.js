$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('nav').addClass('fixed-header');
    }
    else {
       $('nav').removeClass('fixed-header');
    }
});