$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('nav').addClass('fixed-header');
    }
    else {
       $('nav').removeClass('fixed-header');
    }
});

$(document).ready(function(){
  $(".call_modal").click(function(){
	$(".modal").fadeIn();
	$(".modal_main").show();
	  });
});
$(document).ready(function(){
  $(".close").click(function(){
    $(".modal").fadeOut();
	$(".modal_main").fadeOut();
  });
});