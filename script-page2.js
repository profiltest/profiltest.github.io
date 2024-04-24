// HEADER MENU NAV

function toggleNav() {
document.getElementById("burger").classList.toggle("change");
document.getElementById("mySidenav").classList.toggle("open");
}
function toggleSubNav() {
 document.getElementById("subNavLinks").classList.toggle("show");
}

//DESKTOP MENU

function toggleMenu(menuId, event) {
event.preventDefault(); 
var menu = document.getElementById(menuId);
if (menu.style.display === "block") {
  menu.style.display = "none";
} else {
  menu.style.display = "block";
}
}

// DARK MODE

document.addEventListener('DOMContentLoaded', function() {
const darkModeToggle = document.getElementById('darkModeToggle');
const isDarkMode = localStorage.getItem('darkMode') === 'true';
if (isDarkMode) {
document.body.classList.add('dark-mode');
darkModeToggle.checked = true;
}
function toggleDarkMode() {
const isDarkMode = document.body.classList.contains('dark-mode');
localStorage.setItem('darkMode', !isDarkMode);
document.body.classList.toggle('dark-mode');
}
darkModeToggle.addEventListener('change', toggleDarkMode);
});

// SECTION SHOWER

function toggleDiv(divId) {
var divs = document.getElementsByClassName('toggle-div');
for (var i = 0; i < divs.length; i++) {
if (divs[i].id === divId) {
divs[i].style.display = 'block';
} else {
divs[i].style.display = 'none';
}
}
}

// SECTION FILTER

const sectionsToShowOnLoad = document.querySelectorAll('.mono.news-section.section1');
const filterButtons = document.querySelectorAll('.filter-btn');
const sections = document.querySelectorAll('.news-section');
const hideAllSectionsExcept = (sectionsToShow) => {
sections.forEach(section => {
section.style.display = 'none';
});
sectionsToShow.forEach(section => {
section.style.display = 'block';
});
}
hideAllSectionsExcept(sectionsToShowOnLoad);
filterButtons.forEach(button => {
button.addEventListener('click', () => {
const filterValue = button.getAttribute('data-filter');
const sectionsToShow = document.querySelectorAll(`.mono.news-section.${filterValue}`);
hideAllSectionsExcept(sectionsToShow);
});
});
const showAllButton = document.querySelector('.show-all-btn');
if (showAllButton) {
showAllButton.addEventListener('click', () => {
sections.forEach(section => {
section.style.display = 'block';
});
});
}
