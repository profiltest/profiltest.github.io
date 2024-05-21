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

//SLIDESHOWS

function initializeSlider(sliderId) {
let currentIndex = 0;
const slides = document.querySelectorAll(`#${sliderId} .slide`);
const totalSlides = slides.length;
let slideWidth = slides[0].clientWidth;
const slider = document.querySelector(`#${sliderId} .slides`);
function nextSlide() {
currentIndex = (currentIndex + 1) % totalSlides;
updateSlider();
}
function updateSlider() {
const offset = -currentIndex * slideWidth;
slider.style.transition = 'transform 2s ease';
slider.style.transform = `translateX(${offset}px)`;
}
setInterval(nextSlide, 6000); // Auto slide every 6 seconds
// Function to update slide widths based on window size
function updateSlideWidths() {
slideWidth = slides[0].clientWidth;
const offset = -currentIndex * slideWidth;
slider.style.transition = 'none';
slider.style.transform = `translateX(${offset}px)`;
setTimeout(() => {
slider.style.transition = '';
});
}
// Update slide widths when window is resized
window.addEventListener('resize', updateSlideWidths);
// Call the function once on page load to set initial slide widths
updateSlideWidths();
}
// Initialize sliders
initializeSlider('slider1');
initializeSlider('slider2');





