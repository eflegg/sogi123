document.addEventListener("DOMContentLoaded", function() {

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
