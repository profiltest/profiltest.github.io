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

// SECTION SHOWER

function toggleSection(sectionId) {
var sections = document.getElementsByClassName('toggle-section');
for (var i = 0; i < sections.length; i++) {
if (sections[i].id === sectionId) {
sections[i].style.display = 'block';
} else {
sections[i].style.display = 'none';
}
}
}

// SECTION FILTER

const filterButtons = document.querySelectorAll('.filter-btn');
const sections = document.querySelectorAll('.news-section');
const showAllButton = document.querySelector('.show-all-btn');
filterButtons.forEach(button => {
button.addEventListener('click', () => {
const filterValue = button.getAttribute('data-filter');
sections.forEach(section => {
if (section.classList.contains(filterValue)) {
section.style.display = 'block';
} else {
section.style.display = 'none';
}
});
filterButtons.forEach(btn => {
btn.classList.remove('active');
});
button.classList.add('active');
});
});
showAllButton.addEventListener('click', () => {
sections.forEach(section => {
section.style.display = 'block';
});
filterButtons.forEach(btn => {
btn.classList.remove('active');
});
});
window.addEventListener('DOMContentLoaded', () => {
const urlParams = new URLSearchParams(window.location.search);
const filterParam = urlParams.get('filter');
if (filterParam) {
const targetButton = document.querySelector(`[data-filter="${filterParam}"]`);
if (targetButton) {
targetButton.click(); 
}
}
});