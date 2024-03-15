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
    <a href="../en/contact">EN</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">IT</a>
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
    <a href="#" onclick="toggleMenu('servicesMenu', event);">Progetti</a>
    <ul id="servicesMenu" class="dropdown-menu">
      <li><a href="404">Tutti i progetti</a></li>
      <li><a href="404">Rigenerazione spazi urbani</a></li>
      <li><a href="404">Parchi e giardini</a></li>
      <li><a href="404">Riqualificazione ambientale e paesaggistica</a></li>
      <li><a href="404">Inserimento ambientale di infrastrutture</a></li>
      <li><a href="404">Architettura</a></li>
    </ul>
    <a href="contatti">Contatti</a>
  </div>
</header>

<!--MENU-->
<div id="mySidenav" class="sidenav">
  <a href="404">Studio</a>
  <a href="404">News</a>
  <div class="sub-links">
    <a href="#" onclick="toggleSubNav()">Progetti</a>
    <div id="subNavLinks" class="sub-nav-links">
      <a href="404">Tutti i progetti</a>
      <a href="404">Rigenerazione spazi urbani</a>
      <a href="404">Parchi e giardini</a>
      <a href="404">Riqualificazione ambientale e paesaggistica</a>
      <a href="404">Inserimento ambientale di infrastrutture</a>
      <a href="404">Architettura</a>
    </div>
  </div>
  <a href="contatti">Contatti</a>
  <div class="lang-switch" id="LS2">
    <a href="../en/contact">EN</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">IT</a>
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
      <h1>Contatti</h1>
      <h2>Un idea?</h2>
      <p>Siamo entusiasti di avere l'opportunità di connetterci con te. Qui, crediamo che ogni contatto sia una potenziale occasione di collaborazione e crescita reciproca.</p>
      <p>Se sei interessato/a a diventare parte della nostra squadra, esplorare le opportunità di collaborazione o semplicemente condividere idee e feedback, sei nel posto giusto. Siamo sempre alla ricerca di talenti appassionati e motivati che condividono la nostra visione.</p>
      <p>Se sei curioso di conoscere meglio il nostro lavoro e il nostro approccio progettuale, ti invitiamo a visitare la sezione <a href="404">studio</a>. Qui potrai scoprire la nostra filosofia di lavoro e il nostro team.</p>
    </div>
    <div class="text-elements">
      <h1>&nbsp;</h1>
      <h2>Scrivici!</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Nome:</p>
        <input class="fill" type="text" id="name" name="name" placeholder="Maria Rossi" required>
  
        <p>Email:</p>
        <input class="fill" type="email" id="email" name="email" placeholder="mariarossi@esempio.it" required>

        <p>Messagio:</p>
        <textarea id="message" name="message" placeholder="Ciao associati!" required></textarea>

        <input class="send" type="submit" value="Submit">
      </form>
    </div>
    
  </section>

  <section class="split">
    <div class="text-elements">
      <h2>Hai qualcosa in +?</h2>
      <p>In un contesto collaborativo, PA+N Associati ti offre l'opportunità di far parte di un team dinamico, dove la tua crescita personale e professionale è al centro della nostra attenzione. Il nostro studio, focalizzato sull'innovazione e la ricerca, si impegna a trasformare ogni progetto in un'avventura di scoperta. Collaborerai con un gruppo di professionisti appassionati, impegnati nel plasmare il futuro dell'architettura attraverso la progettazione e la gestione dei progetti.</p>
    </div>
    <div class="text-elements">
      <h2>Lavora con noi!</h2>
      <a href="404" class="classic-link">Architetto Senior</a>
      <a href="404" class="classic-link">Architetto Junior</a>
      <a href="404" class="classic-link">Ufficio DL – Computista</a>
      <a href="404" class="classic-link">Profilo tecnico</a>
      <a href="404" class="classic-link">Profilo amministrativo</a>
    </div>
  </section>
</main>

<footer>
  <div class="big-separator"></div>
  <h2>Contatti</h2>

    <div class="footer-bottom">
        <div class="column">
            <h1>Sede</h1>
            <p><a class="text-link" href="https://maps.app.goo.gl/4BmQPbvBmLEBtHKx5">Via Don Carlo Porro 6<br>20128 Milano (MI)<br>Italia</a></p>
        </div>
        <div class="column">
            <h1>Dettagli</h1>
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