$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('nav').addClass('fixed-header');
    }
    else {
       $('nav').removeClass('fixed-header');
    }
});

$(function(){
	$('ul.parent > li').hover(function() {
		$(this).find('ul.child').show(400);
	}, function(){
		$(this).find('ul.child').hide(400);
	});
});

'use strict';

$(function() {

    //settings for slider
    var width = 720;
    var animationSpeed = 1000;
    var pause = 3000;
    var currentSlide = 1;

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $slider.find('.slides');
    var $slides = $slideContainer.find('.slide');

    setInterval(function(){
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                currentSlide++;
                if (currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
});

function openTab(evt, btnName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(btnName).style.display = "block";
    evt.currentTarget.btnName += " active";
}
function created(){
    document.write("Account has been successfully created.");
};