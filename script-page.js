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

// SECTION SHOWER

const sections = document.querySelectorAll('.toggleable-section');
const buttons = document.querySelectorAll('.showSectionButton');
// Show section0 when the page loads
document.getElementById('section0').classList.remove('hidden');
// Add event listener to each button
buttons.forEach(button => {
button.addEventListener('click', function() {
const sectionId = button.getAttribute('data-section-id');
// Hide all toggleable sections
sections.forEach(section => {
section.classList.add('hidden');
});
// Show the corresponding section
document.getElementById(sectionId).classList.remove('hidden');
});
});