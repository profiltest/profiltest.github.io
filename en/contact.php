<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $destinataire = "studio@panassociati.net"; // Adresse e-mail du destinataire
    $sujet = "Nouveau message depuis le formulaire de contact";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Construction du contenu de l'e-mail
    $contenu = "Nom: $name\n";
    $contenu .= "Email: $email\n";
    $contenu .= "Message:\n$message";

    // En-têtes de l'e-mail
    $entetes = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoi de l'e-mail
    if (mail($destinataire, $sujet, $contenu, $entetes)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
    }
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: formulaire_contact.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PA+N Associati</title>
  <link rel="stylesheet" href="../styles.css">
  <link rel="shortcut icon" href="../elements/icone.ico">

  <meta name="author" content="PA+N Associati"> 
  <meta name="description" content="La nostra missione è rivitalizzare spazi degradati, convertendoli in aree vivibili e sostenibili che siano di valore per le comunità locali.">
  <meta name="keywords" content="progetazzione, architettura, natura, rigenerazione, spazi, urbani, parchi, giardini, riqualificazione, ambientale, paeggistica, inserimento, infrastrutture">
  <link rel="canonical" href="https://www.panassociati.net/it/index.html">
  <meta name="robots" content="index,follow">
  <meta property="og:title" content="PA+N Associati | Progetazzione Architettura + Natura">
  <meta property="og:description" content="La nostra missione è rivitalizzare spazi degradati, convertendoli in aree vivibili e sostenibili che siano di valore per le comunità locali.">
  <meta property="og:image" content="../elements/panassociati-thumbnail.jpg">
  <meta property="og:url" content="https://www.panassociati.net">
  <meta property="og:type" content="website">
</head>
<body>

<header class="header">
  <div id="burger" class="burger" onclick="toggleNav()">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </div>
  <a href="index"><img class="svg-img" src="../elements/pan_associati.svg" alt="Logo"></a>
  
  <div class="lang-switch" id="LS1">
    <a href="#">EN</a>&nbsp;&nbsp;|&nbsp;
    <a href="../it/contatti">IT</a>
  </div>
  <div class="DarkModeButton" id="DMB1">
    <input type="checkbox" id="darkModeToggle" class="darkModeToggle">
    <label for="darkModeToggle" class="darkModeLabel">
    <div class="darkModeSlider"></div>
    </label>
  </div>
  <div class="desktop-menu">
    <a href="404">Studio</a>
    <a href="404">News</a>
    <a href="#" onclick="toggleMenu('servicesMenu', event);">Projects</a>
    <ul id="servicesMenu" class="dropdown-menu">
      <li><a href="404">All projects</a></li>
      <li><a href="404">Regeneration of urban spaces</a></li>
      <li><a href="404">Parks and gardens</a></li>
      <li><a href="404">Environmental and landscape redevelopment</a></li>
      <li><a href="404">Environmental insertion of infrastructures</a></li>
      <li><a href="404">Architecture</a></li>
    </ul>
    <a href="contact">Contact</a>
  </div>
</header>

<!--MENU-->
<div id="mySidenav" class="sidenav">
  <a href="404">Studio</a>
  <a href="404">News</a>
  <div class="sub-links">
    <a href="#" onclick="toggleSubNav()">Projects</a>
    <div id="subNavLinks" class="sub-nav-links">
      <a href="404">All projects</a>
      <a href="404">Regeneration of urban spaces</a>
      <a href="404">Parks and gardens</a>
      <a href="404">Environmental and landscape redevelopment</a>
      <a href="404">Environmental insertion of infrastructures</a>
      <a href="404">Architecture</a>
    </div>
  </div>
  <a href="contatti">Contatti</a>
  <div class="lang-switch" id="LS2">
    <a href="#">EN</a>&nbsp;&nbsp;|&nbsp;
    <a href="../it/contatti">IT</a>
  </div>
  <div class="DarkModeButton" id="DMB2">
    <input type="checkbox" id="darkModeToggle" class="darkModeToggle">
    <label for="darkModeToggle" class="darkModeLabel">
    <div class="darkModeSlider"></div>
    </label>
  </div>
  <p>&#x263D;</p>
</div>

<main class="direct-content">
  <section class="split">
    <div class="text-elements">
      <h1>Contact</h1>
      <h2>An idea?</h2>
      <p>We are thrilled to have the opportunity to connect with you. Here, we believe that every contact is a potential opportunity for collaboration and mutual growth.</p>
      <p>If you are interested in becoming part of our team, exploring collaboration opportunities or simply sharing ideas and feedback, you are in the right place. We are always looking for passionate and motivated talents who share our vision.</p>
      <p>If you are curious to learn more about our work and our design approach, we invite you to visit the <a href="404">studio</a> section. Here you can discover our work philosophy and our team.</p>
    </div>
    <div class="text-elements">
      <h1>&nbsp;</h1>
      <h2>Write us!</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Name:</p>
        <input class="fill" type="text" id="name" name="name" placeholder="Maria Rossi" required>
  
        <p>Email:</p>
        <input class="fill" type="email" id="email" name="email" placeholder="mariarossi@esempio.it" required>

        <p>Message:</p>
        <textarea id="message" name="message" placeholder="Ciao associati!" required></textarea>

        <input class="send" type="submit" value="Submit">
      </form>
    </div>
    
  </section>

  <section class="split">
    <div class="text-elements">
      <h2>Do you have something extra?</h2>
      <p>In a collaborative context, PA+N Associati offers you the opportunity to be part of a dynamic team, where your personal and professional growth is at the center of our attention. Our studio, focused on innovation and research, is committed to turning every project into an adventure of discovery. You will collaborate with a group of passionate professionals committed to shaping the future of architecture through design and project management.</p>
    </div>
    <div class="text-elements">
      <h2>Work with us!</h2>
      <a href="404" class="classic-link">Senior Architect</a>
      <a href="404" class="classic-link">Junior Architect</a>
      <a href="404" class="classic-link">DL Office - Accountant</a>
      <a href="404" class="classic-link">Technical Profile</a>
      <a href="404" class="classic-link">Administrative profile</a>
    </div>
  </section>
</main>

<footer>
  <div class="big-separator"></div>
  <h2>Contact</h2>

    <div class="footer-bottom">
        <div class="column">
            <h1>Office</h1>
            <p><a class="text-link" href="https://maps.app.goo.gl/4BmQPbvBmLEBtHKx5">Via Don Carlo Porro 6<br>20128 Milano (MI)<br>Italia</a></p>
        </div>
        <div class="column">
            <h1>Infos</h1>
            <p>Tel:&nbsp;<a class="text-link" href="tel:0039022578982">0039 02 257 8982</a>
            <br>Email:&nbsp;<a class="text-link" href="mailto:studio@panassociati.it">studio@panassociati.it</a>
            <br>Pec:&nbsp;<a class="text-link" href="mailto:studio.panassociati@pec.it">studio.panassociati@pec.it</a></p>
        </div>
        <div class="column">
            <h1>Socials</h1>
            <p><a href="https://www.facebook.com/panassociati/">Facebook</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="https://www.youtube.com/channel/UCbgIvdVyFjuWLhSequXO4Pg">Youtube</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="https://it.linkedin.com/company/pan-associati">LinkedIn</a><br>&nbsp;<br>&nbsp;</p>
        </div>
    </div>

  <p class="foot">PAN Associati s.r.l.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;© Copyright 2024&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class="text-link" href="privacy">Privacy e Cookie Policy</a></p>
</footer>

<script>
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
</script>

</body>
</html>