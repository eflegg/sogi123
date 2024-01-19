document.addEventListener("DOMContentLoaded", function() {

setTimeout(function(){
    $('.home-video').addClass('fading');
}, 3300);

setTimeout(function(){
    $('.home-video').addClass('hidden');
}, 4000);

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

$('.cat-list_item').on('click', function() {
    $('.cat-list_item').removeClass('active');
    $(this).addClass('active');
  
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_projects',
        category: $(this).data('slug'),
        type: $(this).data('type'),
      },
      success: function(res) {
        $('.card-container').html(res);
      }
    })
  });

});