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




const ajaxFilter = document.getElementById( 'ajax-filter' )
const cardContainer = document.querySelector( '.card-container' )
const selectElem = ajaxFilter.querySelector('select');
const postType = selectElem.getAttribute('data-type');

selectElem.addEventListener( 'change', event => {
	
	fetch( ajaxurl + '?action=ajaxfilter', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify( { 
			'cat' : event.target.value,
      'dataType' : postType, 
      
		} ),
    
	}).then( response => {
		return response.text()
	}).then( response => {

		if( response ) {
			cardContainer.innerHTML = response;
		}
	
		//console.log( response );
    console.log(postType);
    
   

	}).catch( error => {
		console.log( error )
	})

} )





//accessiblie hover nav, adds focus state to li, removes it on blur. 
//works going forward, drops to bottom of submenu when going backward
const topLevelLinks = document.querySelectorAll('.menu-item > a')

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

    const lastLink = subMenuLinks[lastLinkIndex]

    lastLink.addEventListener('blur', function() {
      link.parentElement.classList.remove('focus')
    })
  }
  })






//check viewport width on resize
  let viewportWidth = window.innerWidth;

  function updateWindowWidth(){
    if(viewportWidth < 1000){
      mobileNav.classList.add('mobile-nav');
      mobileNav.classList.remove('desktop-nav');
    } else if (viewportWidth >= 1000) {
      mobileNav.classList.add('desktop-nav');
      mobileNav.classList.remove('mobile-nav');
    }
  }
  
  window.addEventListener("resize", updateWindowWidth);
  
  const menuToggle = this.querySelector('.menu-toggle');
  const mobileNav = this.querySelector('nav');
  
  
  //toggle mobile nav open using aria-labels connected to css
  menuToggle.addEventListener("click", () => {
  const expanded = menuToggle.getAttribute("aria-expanded");
  if (expanded === "false") {
    mobileNav.setAttribute("aria-hidden", false);
      menuToggle.setAttribute("aria-expanded", true);
      menuToggle.setAttribute("aria-label", "Close menu");
      menuToggle.lastElementChild.textContent = "Close";
      document.body.style.overflowY = "hidden";
  } else {
    mobileNav.setAttribute("aria-hidden", true);
    menuToggle.setAttribute("aria-expanded", false);
    menuToggle.setAttribute("aria-label", "Open menu");
    menuToggle.lastElementChild.textContent = "Menu";
    document.body.style.overflowY = "initial";
  }
  });


  //updates carousel. need to test swipe
  //wordy but does the trick

  var carousel = document.querySelector('.carousel');
  console.log('carousel: ', carousel);
  var carouselContent = document.querySelector('.carousel-content');
  console.log('carousel content: ', carouselContent);
  var slides = document.querySelectorAll('.slide');
  console.log('slides: ', slides);
  var arrayOfSlides = Array.prototype.slice.call(slides);
  console.log('array of slides: ', arrayOfSlides);
  var carouselDisplaying;
  var screenSize;
  setScreenSize();

  console.log('carousel: ', carousel);
  console.log('carousel content: ', carouselContent);
  console.log('slides: ', slides);
  console.log('array of slides: ', arrayOfSlides);




  function addClone() {
    var lastSlide = carouselContent.lastElementChild.cloneNode(true);
    lastSlide.style.left = (-lengthOfSlide) + "px";
    carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
 }

 function removeClone() {
  var firstSlide = carouselContent.firstElementChild;
  firstSlide.parentNode.removeChild(firstSlide);
}

function moveSlidesRight() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  var width = 0;
  slidesArray.forEach(function(el, i){
    el.style.left = width + "px";
    width += lengthOfSlide;
  });
  addClone();
}
moveSlidesRight();

function moveSlidesLeft() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  slidesArray = slidesArray.reverse();
  var maxWidth = (slidesArray.length - 1) * lengthOfSlide;

  slidesArray.forEach(function(el, i){
    maxWidth -= lengthOfSlide;
    el.style.left = maxWidth + "px";
  });
}

window.addEventListener('resize', setScreenSize);
function setScreenSize() {
  if ( window.innerWidth >= 800 ) {
    carouselDisplaying = 3;
  } else if ( window.innerWidth >= 600 ) {
  
    carouselDisplaying = 2;
  } else {
    carouselDisplaying = 1;
  }
  getScreenSize();
}
function getScreenSize() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  lengthOfSlide = ( carousel.offsetWidth  / carouselDisplaying );
  var initialWidth = -lengthOfSlide;
  slidesArray.forEach(function(el) {
    el.style.width = lengthOfSlide + "px";
    el.style.left = initialWidth + "px";
    initialWidth += lengthOfSlide;
  });
}

var rightNav = document.querySelector('.nav-right');
rightNav.addEventListener('click', moveLeft);

var moving = true;
function moveRight() {
  if ( moving ) {
    moving = false;
    var lastSlide = carouselContent.lastElementChild;
    lastSlide.parentNode.removeChild(lastSlide);
    carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
    removeClone();
    var firstSlide = carouselContent.firstElementChild;
    firstSlide.addEventListener('transitionend', activateAgain);
    moveSlidesRight();
  }
}

function activateAgain() {
  var firstSlide = carouselContent.firstElementChild;
  moving = true;
  firstSlide.removeEventListener('transitionend', activateAgain);
}

var leftNav = document.querySelector('.nav-left');
leftNav.addEventListener('click', moveRight);

function moveLeft() {
  if ( moving ) {
    moving = false;
    removeClone();
    var firstSlide = carouselContent.firstElementChild;
    firstSlide.addEventListener('transitionend', replaceToEnd);
    moveSlidesLeft();
  }
}

function replaceToEnd() {
  var firstSlide = carouselContent.firstElementChild;
  firstSlide.parentNode.removeChild(firstSlide);
  carouselContent.appendChild(firstSlide);
  firstSlide.style.left = ( (arrayOfSlides.length -1) * lengthOfSlide) + "px";
  addClone();
  moving = true;
  firstSlide.removeEventListener('transitionend', replaceToEnd);
}


//mouse swiping to change slides. maybe get rid of
carouselContent.addEventListener('mousedown', seeMovement);

var initialX;
var initialPos;
function seeMovement(e) {
  initialX = e.clientX;
  getInitialPos();
  carouselContent.addEventListener('mousemove', slightMove);
  document.addEventListener('mouseup', moveBasedOnMouse);
}

function slightMove(e) {
  if ( moving ) {
    var movingX = e.clientX;
    var difference = initialX - movingX;
    if ( Math.abs(difference) < (lengthOfSlide/4) ) {
      slightMoveSlides(difference);
    }  
  }
}

function getInitialPos() {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  initialPos = [];
  slidesArray.forEach(function(el){
    var left = Math.floor( parseInt( el.style.left.slice(0, -2 ) ) ); 
    initialPos.push( left );
  });
}

function slightMoveSlides(newX) {
  var slides = document.querySelectorAll('.slide');
  var slidesArray = Array.prototype.slice.call(slides);
  slidesArray.forEach(function(el, i){
    var oldLeft = initialPos[i];
    el.style.left = (oldLeft + newX) + "px";
  });
}

function moveBasedOnMouse(e) { 
  var finalX = e.clientX;
  if ( initialX - finalX > 0) {
    moveRight();
  } else if ( initialX - finalX < 0 ) {
    moveLeft();
  }
  document.removeEventListener('mouseup', moveBasedOnMouse);
  carouselContent.removeEventListener('mousemove', slightMove);
}


//tabs
function onTabClick(event) {
  let activeTabs = document.querySelectorAll('.active');

  // deactivate existing active tab and panel 
  activeTabs.forEach(function(tab) {
    tab.className = tab.className.replace('active', '');
  });

  // activate new tab and panel
  event.target.parentElement.className += ' active';
  document.getElementById(event.target.href.split('#')[1]).className += ' active';
}

const element = document.getElementById('nav-tab');

element.addEventListener('click', onTabClick, false);

});





