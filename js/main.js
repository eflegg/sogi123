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






  //better carousel


  // const imageList = document.querySelector(".slider-wrapper .image-list");
  // const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
  // const singleSlides = document.querySelectorAll(".single-slide");
  
  // const initSlider = () => {
  
  // // console.log(singleSlides);  
  // // console.log(imageList.clientWidth/3);
  
  // const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
  
  
  // //set slide width
  // singleSlides.forEach(single =>{
  //   if(window.innerWidth < 600){
  //     single.style.width = (imageList.clientWidth ) + 'px';
  //   } else if(window.innerWidth < 800){
  //     single.style.width = (imageList.clientWidth ) / 2 + 'px';
  //   } else {
  //     single.style.width = (imageList.clientWidth ) / 3 + 'px';
  //   }
  // })
    
  //   // Slide images according to the slide button clicks
  //   slideButtons.forEach(button => {
  //       button.addEventListener("click", () => {
  //           const direction = button.id === "prev-slide" ? -1 : 1;
  //           const scrollAmount = imageList.clientWidth * direction;
  //           imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
  //       });
  //   });
  //    // Show or hide slide buttons based on scroll position
  //   const handleSlideButtons = () => {
  //       slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
  //       slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
  //   }
  
  //   // Call these two functions when image list scrolls
  //   imageList.addEventListener("scroll", () => {
  //       handleSlideButtons();
  //   });
  // }
  
  // window.addEventListener("resize", initSlider );
  // window.addEventListener("load", initSlider);



 //header search func 
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

// click funtionality and proper tab direction behaviour

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
   
		const subMenu = expandedItem.querySelector(".second-level-subnav");
		const focusedElement = expandedItem.querySelector(":focus");
		const firstFocusableElement = expandedItem.querySelector("a");
		const lastFocusableElement = subMenu.lastElementChild.querySelector("a");
  

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


    
    const focusable =
      'button:not(#header-search, #searchsubmit2),  a:not(.skiplink, .btn--fat, .home-logo)';
    const focusableElements = element.querySelectorAll(focusable);

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
  const header = document.querySelector('header');
  menuButton.addEventListener("click", () => {
  const expanded = menuButton.getAttribute("aria-expanded");
  if (expanded === "false") {
    navigation.setAttribute("aria-hidden", false);
      menuButton.setAttribute("aria-expanded", true);
      menuButton.setAttribute("aria-label", "Close menu");
      // menuButton.lastElementChild.textContent = "Close";
      document.body.style.overflow = "hidden";

      header.style.position = "fixed";
      focusTrap(trapContainer, menuButton, handleHamburgerClose);
      if (mobileScreen){
        mobileScreen.style.overflowY = "hidden";

      } else {
        document.body.style.overflow = "hidden";
        document.body.style.height = "120vh";
      
      }
  } else {
    navigation.setAttribute("aria-hidden", true);
    menuButton.setAttribute("aria-expanded", false);
    menuButton.setAttribute("aria-label", "Open menu");
    // menuButton.lastElementChild.textContent = "Menu";
    document.body.style.overflowY = "initial";
    document.body.style.height = "100%";
    header.style.position = "absolute";
  }
  });



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




