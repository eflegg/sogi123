document.addEventListener("DOMContentLoaded", function() {

setTimeout(function(){
    $('.home-video').addClass('fading');
}, 3200);

setTimeout(function(){
    $('.home-video').addClass('hidden');
}, 3600);

$(".fade-me").waypoint(function(){
   $(this[0,'element']).addClass("faded-in");
}, {
    offset: "80%"
});

$('.menu-toggle').click(function() {
    $('body').toggleClass('drawer-open');
});

$('nav .cta').click(function() {
    document.querySelector('.cta-block').scrollIntoView({ 
      behavior: 'smooth' 
    });
    return false;
});



});