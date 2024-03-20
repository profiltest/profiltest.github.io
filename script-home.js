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
event.preventDefault(); // Prevents the default behavior of the link
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
// Check if dark mode preference is stored in local storage
const isDarkMode = localStorage.getItem('darkMode') === 'true';
// Set initial dark mode state based on local storage
if (isDarkMode) {
document.body.classList.add('dark-mode');
darkModeToggle.checked = true;
}
// Toggle dark mode function
function toggleDarkMode() {
const isDarkMode = document.body.classList.contains('dark-mode');
localStorage.setItem('darkMode', !isDarkMode); // Store dark mode state in local storage
document.body.classList.toggle('dark-mode');
}
// Event listener for dark mode toggle switch
darkModeToggle.addEventListener('change', toggleDarkMode);
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