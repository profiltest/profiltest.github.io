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

      // Toggle visibility based on classes
      sections.forEach(section => {
        if (section.classList.contains(filterValue)) {
          section.style.display = 'block';
        } else {
          section.style.display = 'none';
        }
      });

      // Remove active class from all buttons
      filterButtons.forEach(btn => {
        btn.classList.remove('active');
      });

      // Add active class to clicked button
      button.classList.add('active');
    });
  });

  showAllButton.addEventListener('click', () => {
    // Show all sections
    sections.forEach(section => {
      section.style.display = 'block';
    });

    // Remove active class from all buttons
    filterButtons.forEach(btn => {
      btn.classList.remove('active');
    });
  });