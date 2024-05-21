// HEADER SCROLL

function updateHeaderBackground() {
var header = document.querySelector('header');
var scrollPosition = window.scrollY;
var isDarkMode = localStorage.getItem('darkMode') === 'true';
if (isDarkMode) {
if (scrollPosition > 250) {
header.style.backgroundColor = '#1B1B1A';
} else {
header.style.backgroundColor = 'transparent';
}
} else {
if (scrollPosition > 250) {
header.style.backgroundColor = '#fff';
} else {
header.style.backgroundColor = 'transparent';
}
}
}
window.addEventListener('scroll', updateHeaderBackground);

// HEADER MENU NAV

function toggleNav() {
document.getElementById("burger").classList.toggle("change");
document.getElementById("mySidenav").classList.toggle("open");
}
function toggleSubNav() {
document.getElementById("subNavLinks").classList.toggle("show");
}

// DARK MODE

document.addEventListener('DOMContentLoaded', function() {
const darkModeToggle1 = document.getElementById('darkModeToggle1');
const darkModeToggle2 = document.getElementById('darkModeToggle2');
const isDarkMode = localStorage.getItem('darkMode') === 'true';
if (isDarkMode) {
document.body.classList.add('dark-mode');
darkModeToggle1.checked = true;
darkModeToggle2.checked = true;
}
function toggleDarkMode() {
const isDarkMode = document.body.classList.contains('dark-mode');
localStorage.setItem('darkMode', !isDarkMode);
document.body.classList.toggle('dark-mode');
updateHeaderBackground();  // Update header background color immediately when toggling dark mode
}
darkModeToggle1.addEventListener('change', toggleDarkMode);
darkModeToggle2.addEventListener('change', toggleDarkMode);
updateHeaderBackground();  // Ensure header background color is set correctly on page load
});

// DIV SHOWER

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

// SECTION SHOWER

const sectionsToShowOnLoad = document.querySelectorAll('.news-section.section1');
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
const sectionsToShow = document.querySelectorAll(`.news-section.${filterValue}`);
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
