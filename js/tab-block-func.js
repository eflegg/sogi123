document.addEventListener("DOMContentLoaded", function() {

//tabs

let tabSections = document.querySelectorAll('.tab-container');

tabSections.forEach((tabSection) => {
  let allTabs = tabSection.querySelectorAll('.tab-item');
  let allTabPanes = tabSection.querySelectorAll('.tab-pane');

  setFirstTab(tabSection);
  setAllTabs(allTabs, allTabPanes, tabSection);
});


function setFirstTab(tabSection) {
  //add active class to first child of dynamic list, both panes and tabs
  const firstTabPanel = tabSection.querySelector('.tab-content').firstElementChild;
  firstTabPanel.classList.add('active-tab');

  const firstTab = tabSection.querySelector('.tab-nav').firstElementChild;
  firstTab.classList.add('active-tab');
}

function setAllTabs(allTabs, allTabPanes, tabSection) {
  allTabs.forEach((tabItem) => {
    tabItem.addEventListener('click', function() {
      let currentTab = tabItem.getAttribute('data-link');

      removeActiveTab(allTabs, allTabPanes);
      setActiveTab(tabItem, currentTab, tabSection);
      
    });

    tabItem.addEventListener('focusin', function() {
      let currentTab = tabItem.getAttribute('data-link');

      removeActiveTab(allTabs, allTabPanes);
      setActiveTab(tabItem, currentTab, tabSection);
      
    });
  });
}


function removeActiveTab(allTabs, allTabPanes) {
  allTabs.forEach((tabItem) => {
    tabItem.classList.remove('active-tab');
  });

  allTabPanes.forEach((tabPane) => {
    tabPane.classList.remove('active-tab');
  });
}

function setActiveTab(tabItem, currentTab, tabSection) {
  tabItem.classList.toggle('active-tab');

  let container = tabItem.closest('.tab-container');
  let currentTabPane = container.querySelector('#' + currentTab);
  currentTabPane.classList.add('active-tab');
}

// function onTabClick(event) {
//   let activeTabs = document.querySelectorAll('.active-tab');

//   // deactivate existing active tab and panel 
//   activeTabs.forEach(function(tab) {
//     tab.className = tab.className.replace('active-tab', '');
//   });

//   // find closes li to clicked item and either remove or add active class
//   event.target.closest('li').className += ' active-tab';

//    // get the element with the id that matches the data attr of clicked item
//   document.getElementById(event.target.getAttribute('data-link')).className += ' active-tab';
// }

// const element = document.getElementById('nav-tab');

// element.addEventListener('focusin', onTabClick, false);
// element.addEventListener('click', onTabClick, false);

});
