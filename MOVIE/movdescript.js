$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('nav').addClass('fixed-header');
    }
    else {
       $('nav').removeClass('fixed-header');
    }
});

$(document).ready(function(){
var src = $(".modal_main").children('iframe').attr('src');
  $(".call_modal").click(function(e){
  e.preventDefault();
  $(".modal").fadeIn();
  $(".modal_main").show();
    $(".modal_main").children('iframe').attr('src', src);
    });
    
    $(".close").click(function(e) {
      e.preventDefault();
      $(".modal_main").children('iframe').attr('src', '');
      $(".modal").fadeOut();
        $(".modal_main").fadeOut();
    });
});

/*
$(document).ready(function(){
   $(".close").click(function(){
      $(".modal").fadeOut();
      $(".modal_main").fadeOut();
      $(".modal_main").empty();
   });
});

$(document).ready(function() {
    // set unique id to videoplayer for the Webflow video element
    var src = $(".modal_main").children('iframe').attr('src');

    // when object with class open-popup is clicked...
    $(".call_modal").click(function(e) {
      e.preventDefault();
      // change the src value of the video
      $(".modal_main").children('iframe').attr('src', src);
      $(".modal").fadeIn();
    });

    // when object with class close-popup is clicked...
    $(".close").click(function(e) {
      e.preventDefault();
      $(".modal_main").children('iframe').attr('src', '');
      $(".modal").fadeOut();
    });
  });
*/
/*
$('.call_modal').click(function (e) {
        e.preventDefault();
        var sitetypeHref = $(this).attr('href');
        var sitetypeHrefAuto = sitetypeHref + "?autoplay=1"
        //sitetypeHref = sitetypeHref.replace('watch?v=', 'v/');
        $('#modal_main').on('shown.bs.modal', function () {
            var iFrame = $(this).find("iframe");
            iFrame.attr("src", sitetypeHrefAuto);
        });
        $("#modal_main").on('hidden.bs.modal', function () {
            var iFrame = $(this).find("iframe");
            iFrame.attr("src", sitetypeHref);
        });
        $('#modal_main').modal({ show: true });
    });
/*$(".close").on('click', function(){
    stopVideo();
});*/

$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    alert(maxDate);
    $('#txtDate').attr('min', maxDate);
});
