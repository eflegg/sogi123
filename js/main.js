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


//Triggers post filters
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



//accessiblie hover nav, adds focus state to li, removes it on blur. 
//works going forward, drops to bottom of submenu when going backward
const topLevelLinks = document.querySelectorAll('.menu-item > a')
console.log(topLevelLinks);
topLevelLinks.forEach(link => {
	link.addEventListener('focus', function() {
		this.parentElement.classList.add('focus')
	})
	link.addEventListener('click', function() {
		this.parentElement.classList.add('focus')
	})
  if (link.nextElementSibling) {
    const subMenu = link.nextElementSibling
    const subMenuLinks = subMenu.querySelectorAll('a')
    const lastLinkIndex = subMenuLinks.length - 1
    console.log(lastLinkIndex)
    const lastLink = subMenuLinks[lastLinkIndex]
    console.log(lastLink)

    lastLink.addEventListener('blur', function() {
      link.parentElement.classList.remove('focus')
    })
  }
  })

});
