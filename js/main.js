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
	
		console.log( response );
    console.log(postType);
    
   

	}).catch( error => {
		console.log( error )
	})

} )



const el = document.querySelector(".header-search");
const headerSearchBar = document.querySelector('.header-search-container>.custom-searchform');

el.addEventListener("click", function(event) {
  event.preventDefault();
  //add a class
  headerSearchBar.classList.add("search-visible");
});
document.addEventListener("keydown", (event) => {
	if (event.key == "Escape") {
    headerSearchBar.classList.remove("search-visible");
	}
});






//add classes to subnav for easier styling
const topSubnavs = document.querySelectorAll('#menu-main-menu > .menu-item-has-children>.sub-menu');


//insert a button after each top level subnav
topSubnavs.forEach(sub => {
  sub.classList.add('top-level-subnav');
  const dropButton = document.createElement('button');
  dropButton.classList.add('sub-nav-toggle');
  sub.parentNode.insertBefore(dropButton, sub);
})

//add class to sub-subnav
const secondSubnavs = document.querySelectorAll('.top-level-subnav>.menu-item-has-children>.sub-menu');
secondSubnavs.forEach(sub => {
  sub.classList.add('second-level-subnav');
})

//first attempt at adding the click funtionality and proper tab direction behaviour



const menuItems = document.querySelectorAll(".main>.menu-item-has-children");
let expandedItem = null;

const expandSubMenu = (item) => {
	const subMenu = item.querySelector("ul");
	const button = item.querySelector("button");
	expandedItem = item;

	subMenu.setAttribute("aria-hidden","false");
	button.setAttribute("aria-expanded","true");
	item.dataset.expanded = "true";
};

const collapseSubMenu = (item) => {
	const subMenu = item.querySelector("ul");
	const button = item.querySelector("button");

	expandedItem = null;

	subMenu.setAttribute("aria-hidden","true");
	button.setAttribute("aria-expanded","false");
	item.dataset.expanded = "false";
};

menuItems.forEach((item) => {
	const button = item.querySelector("button");
	button.addEventListener("click", () => {
		if (button.ariaExpanded === "false") {
			expandSubMenu(item);
		} else {
			collapseSubMenu(item);
		}
	});

	item.addEventListener("mouseenter", () => {
		expandSubMenu(item);
	});
	item.addEventListener("mouseleave", () => {
		collapseSubMenu(item);
	});
});



document.addEventListener("keydown", (event) => {
	if (event.key === "Tab") {
		if (!expandedItem) {
			return;
		}
    console.log(expandedItem);
		const subMenu = expandedItem.querySelector(".second-level-subnav");

		const focusedElement = expandedItem.querySelector(":focus");
    console.log(focusedElement);
		const firstFocusableElement = expandedItem.querySelector("a");
    console.log(firstFocusableElement);
		const lastFocusableElement = subMenu.lastElementChild.querySelector("a");
    console.log(lastFocusableElement);

		if (!event.shiftKey && focusedElement === lastFocusableElement) {
			collapseSubMenu(expandedItem);
			return;
		}

		if (event.shiftKey && focusedElement === firstFocusableElement) {
			collapseSubMenu(expandedItem);
			return;
		}
	}

	if (event.key == "Escape") {
		collapseSubMenu(expandedItem);
	}
});




//check viewport width on resize
  let viewportWidth = window.innerWidth;

  function updateWindowWidth(){
    if(viewportWidth < 1000){
      navigation.classList.add('mobile-nav');
      navigation.classList.remove('desktop-nav');
    } else if (viewportWidth >= 1000) {
      navigation.classList.add('desktop-nav');
      navigation.classList.remove('mobile-nav');
    }
  }
  
  window.addEventListener("resize", updateWindowWidth);


  const mobileScreen = document.querySelector(".mobile-nav");
  const menuButton = document.querySelector(".js-menu-button");
  const navigation = document.querySelector(".js-navigation");
  const trapContainer = document.querySelector("header");
  
  const handleHamburgerClose = () => {
    navigation.setAttribute("aria-hidden", true);
    menuButton.setAttribute("aria-expanded", false);
    menuButton.setAttribute("aria-label", "Menu");
    // menuButton.lastElementChild.textContent = "Menu";
  
    if (mobileScreen){
      mobileScreen.style.overflowY = "scroll";
    } else {
      document.body.style.overflowY = "initial";
    }
  };



  //Focus trap

  
  function focusTrap(element, removeButton, handleClose) {
    console.log('element: ', element);

    
    const focusable =
      'button:not(#header-search, #searchsubmit2),  a:not(.skiplink, .btn--fat, .home-logo)';
    const focusableElements = element.querySelectorAll(focusable);
    console.log(focusableElements);
    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];
    firstFocusableElement.focus();
  
    const shutdownFocusTrap = () => {
      handleClose();
      element.removeEventListener('keydown', handleKeydown);
      removeButton.removeEventListener('click', shutdownFocusTrap);
      removeButton.focus();
    };
  
    removeButton.addEventListener('click', shutdownFocusTrap);
    
    const handleKeydown = (event) => {
      const isEscPressed = (event.key === 'Escape');
      const isTabPressed = (event.key === 'Tab' || event.keyCode === 9);
      
  
      if ( isEscPressed ) {
        shutdownFocusTrap();
      }
      
      if ( !isTabPressed ) {
        return;
      }
      
      if ( event.shiftKey ) {
        if ( document.activeElement === firstFocusableElement ) {
          event.preventDefault();
          lastFocusableElement.focus();
        }
        return;
      }
      
      if ( document.activeElement === lastFocusableElement ) {
        event.preventDefault();
        firstFocusableElement.focus();
      }
    };
    
    element.addEventListener('keydown', handleKeydown);
  }
  
  //toggle mobile nav open using aria-labels connected to css
  const headerButtons = document.querySelector('.header-buttons');
  menuButton.addEventListener("click", () => {
  const expanded = menuButton.getAttribute("aria-expanded");
  if (expanded === "false") {
    navigation.setAttribute("aria-hidden", false);
      menuButton.setAttribute("aria-expanded", true);
      menuButton.setAttribute("aria-label", "Close menu");
      // menuButton.lastElementChild.textContent = "Close";
      document.body.style.overflowY = "hidden";
      headerButtons.style.display = "none";
      focusTrap(trapContainer, menuButton, handleHamburgerClose);
      if (mobileScreen){
        mobileScreen.style.overflowY = "hidden";

      } else {
        document.body.style.overflowY = "hidden";
     
      
      }
  } else {
    navigation.setAttribute("aria-hidden", true);
    menuButton.setAttribute("aria-expanded", false);
    menuButton.setAttribute("aria-label", "Open menu");
    // menuButton.lastElementChild.textContent = "Menu";
    document.body.style.overflowY = "initial";
    headerButtons.style.display = "flex";
  }
  });

 

  //better carousel


const imageList = document.querySelector(".slider-wrapper .image-list");
const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
const singleSlides = document.querySelectorAll(".single-slide");

const initSlider = () => {

console.log(singleSlides);  
console.log(imageList.clientWidth/3);

const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;


//set slide width
singleSlides.forEach(single =>{
  if(window.innerWidth < 600){
    single.style.width = (imageList.clientWidth ) + 'px';
  } else if(window.innerWidth < 800){
    single.style.width = (imageList.clientWidth ) / 2 + 'px';
  } else {
    single.style.width = (imageList.clientWidth ) / 3 + 'px';
  }
})
  
  // Slide images according to the slide button clicks
  slideButtons.forEach(button => {
      button.addEventListener("click", () => {
          const direction = button.id === "prev-slide" ? -1 : 1;
          const scrollAmount = imageList.clientWidth * direction;
          imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
      });
  });
   // Show or hide slide buttons based on scroll position
  const handleSlideButtons = () => {
      slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
      slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
  }

  // Call these two functions when image list scrolls
  imageList.addEventListener("scroll", () => {
      handleSlideButtons();
  });
}

window.addEventListener("resize", initSlider );
window.addEventListener("load", initSlider);


  



//tabs

//add active class to first child of dynamic list, both panes and tabs
const firstTabPanel = document.querySelector('.tab-content').firstElementChild;
firstTabPanel.classList.add('active-tab');

const firstTab = document.querySelector('.tab-nav').firstElementChild;
firstTab.classList.add('active-tab');

function onTabClick(event) {
  let activeTabs = document.querySelectorAll('.active-tab');


  // deactivate existing active tab and panel 
  activeTabs.forEach(function(tab) {
    tab.className = tab.className.replace('active-tab', '');
  });

  // find closes li to clicked item and either remove or add active class
  event.target.closest('li').className += ' active-tab';

   // get the element with the id that matches the data attr of clicked item
  document.getElementById(event.target.getAttribute('data-link')).className += ' active-tab';


}

const element = document.getElementById('nav-tab');

element.addEventListener('focusin', onTabClick, false);
element.addEventListener('click', onTabClick, false);








});




//worse update carousel

//   var carousel = document.querySelector('.carousel');

//   var carouselContent = document.querySelector('.carousel-content');

//   var slides = document.querySelectorAll('.slide');

//   var arrayOfSlides = Array.prototype.slice.call(slides);

//   var carouselDisplaying;
//   var screenSize;
//   setScreenSize();

//   // console.log('carousel: ', carousel);
//   // console.log('carousel content: ', carouselContent);
//   // console.log('slides: ', slides);
//   // console.log('array of slides: ', arrayOfSlides);




//   function addClone() {
//     var lastSlide = carouselContent.lastElementChild.cloneNode(true);
//     lastSlide.style.left = (-lengthOfSlide) + "px";
//     carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
//  }

//  function removeClone() {
//   var firstSlide = carouselContent.firstElementChild;
//   firstSlide.parentNode.removeChild(firstSlide);
// }

// function moveSlidesRight() {
//   var slides = document.querySelectorAll('.slide');
//   var slidesArray = Array.prototype.slice.call(slides);
//   var width = 0;
//   slidesArray.forEach(function(el, i){
//     el.style.left = width + "px";
//     width += lengthOfSlide;
//   });
//   addClone();
// }
// moveSlidesRight();

// function moveSlidesLeft() {
//   var slides = document.querySelectorAll('.slide');
//   var slidesArray = Array.prototype.slice.call(slides);
//   slidesArray = slidesArray.reverse();
//   var maxWidth = (slidesArray.length - 1) * lengthOfSlide;

//   slidesArray.forEach(function(el, i){
//     maxWidth -= lengthOfSlide;
//     el.style.left = maxWidth + "px";
//   });
// }

// window.addEventListener('resize', setScreenSize);
// function setScreenSize() {
//   if ( window.innerWidth >= 800 ) {
//     carouselDisplaying = 3;
//   } else if ( window.innerWidth >= 600 ) {
  
//     carouselDisplaying = 2;
//   } else {
//     carouselDisplaying = 1;
//   }
//   getScreenSize();
// }
// function getScreenSize() {
//   var slides = document.querySelectorAll('.slide');
//   var slidesArray = Array.prototype.slice.call(slides);
//   lengthOfSlide = ( carousel.offsetWidth  / carouselDisplaying );
//   var initialWidth = -lengthOfSlide;
//   slidesArray.forEach(function(el) {
//     el.style.width = lengthOfSlide + "px";
//     el.style.left = initialWidth + "px";
//     initialWidth += lengthOfSlide;
//   });
// }

// var rightNav = document.querySelector('.nav-right');
// rightNav.addEventListener('click', moveLeft);

// var moving = true;
// function moveRight() {
//   if ( moving ) {
//     moving = false;
//     var lastSlide = carouselContent.lastElementChild;
//     lastSlide.parentNode.removeChild(lastSlide);
//     carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
//     removeClone();
//     var firstSlide = carouselContent.firstElementChild;
//     firstSlide.addEventListener('transitionend', activateAgain);
//     moveSlidesRight();
//   }
// }

// function activateAgain() {
//   var firstSlide = carouselContent.firstElementChild;
//   moving = true;
//   firstSlide.removeEventListener('transitionend', activateAgain);
// }

// var leftNav = document.querySelector('.nav-left');
// leftNav.addEventListener('click', moveRight);

// function moveLeft() {
//   if ( moving ) {
//     moving = false;
//     removeClone();
//     var firstSlide = carouselContent.firstElementChild;
//     firstSlide.addEventListener('transitionend', replaceToEnd);
//     moveSlidesLeft();
//   }
// }

// function replaceToEnd() {
//   var firstSlide = carouselContent.firstElementChild;
//   firstSlide.parentNode.removeChild(firstSlide);
//   carouselContent.appendChild(firstSlide);
//   firstSlide.style.left = ( (arrayOfSlides.length -1) * lengthOfSlide) + "px";
//   addClone();
//   moving = true;
//   firstSlide.removeEventListener('transitionend', replaceToEnd);
// }



// carouselContent.addEventListener('mousedown', seeMovement);

// var initialX;
// var initialPos;
// function seeMovement(e) {
//   initialX = e.clientX;
//   getInitialPos();
//   carouselContent.addEventListener('mousemove', slightMove);
//   document.addEventListener('mouseup', moveBasedOnMouse);
// }

// function slightMove(e) {
//   if ( moving ) {
//     var movingX = e.clientX;
//     var difference = initialX - movingX;
//     if ( Math.abs(difference) < (lengthOfSlide/4) ) {
//       slightMoveSlides(difference);
//     }  
//   }
// }

// function getInitialPos() {
//   var slides = document.querySelectorAll('.slide');
//   var slidesArray = Array.prototype.slice.call(slides);
//   initialPos = [];
//   slidesArray.forEach(function(el){
//     var left = Math.floor( parseInt( el.style.left.slice(0, -2 ) ) ); 
//     initialPos.push( left );
//   });
// }

// function slightMoveSlides(newX) {
//   var slides = document.querySelectorAll('.slide');
//   var slidesArray = Array.prototype.slice.call(slides);
//   slidesArray.forEach(function(el, i){
//     var oldLeft = initialPos[i];
//     el.style.left = (oldLeft + newX) + "px";
//   });
// }

// function moveBasedOnMouse(e) { 
//   var finalX = e.clientX;
//   if ( initialX - finalX > 0) {
//     moveRight();
//   } else if ( initialX - finalX < 0 ) {
//     moveLeft();
//   }
//   document.removeEventListener('mouseup', moveBasedOnMouse);
//   carouselContent.removeEventListener('mousemove', slightMove);
// }




