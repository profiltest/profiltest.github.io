<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'studio@panassociati.it';
    $subject = 'Sito: nuovo messaggio da ' . $name;
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    $file = $_FILES['document'];
    $filePath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileType = $file['type'];

    if (is_uploaded_file($filePath)) {
        $fileContent = file_get_contents($filePath);
        $boundary = md5(uniqid(time()));
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
        
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= "Name: $name\nEmail: $email\nMessage: $message\r\n";
        
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: $fileType; name=\"$fileName\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n\r\n";
        $body .= chunk_split(base64_encode($fileContent)) . "\r\n";
        $body .= "--$boundary--";

        if (mail($to, $subject, $body, $headers)) {
            echo "La tua email è stata inviata con successo.";
        } else {
            echo "Si è verificato un errore durante l'invio della tua email. Per favore riprova più tardi.";
        }
    } else {
        echo "Errore durante il download del file. Per favore riprova più tardi.";
    }
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

<header>
  <div id="burger" class="burger" onclick="toggleNav()">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </div>
  <a href="index"><img class="svg-img" src="../elements/pan_associati.svg" alt="Logo"></a>
  
  <div class="lang-switch" id="LS1">
    <a href="#">EN</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">IT</a>
  </div>
  <div class="DarkModeButton" id="DMB1">
    <input type="checkbox" id="darkModeToggle1" class="darkModeToggle">
    <label for="darkModeToggle1" class="darkModeLabel">
      <img class="svg-img" src="../elements/dm.svg">
    </label>
  </div>
  <div class="desktop-menu">
    <a href="studio">Studio</a>
    <a href="progetti">Progetti</a>
    <a href="news">News</a>
    <a href="contatti">Contatti</a>
  </div>
</header>

<!--MENU-->
<div id="mySidenav" class="sidenav">
  <a href="studio">Studio</a>
  <a href="progetti">Progetti</a>
  <a href="news">News</a>
  <a href="contatti">Contatti</a>
  <div class="lang-switch" id="LS2">
    <a href="#">EN</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">IT</a>
  </div>
  <div class="DarkModeButton" id="DMB2">
    <input type="checkbox" id="darkModeToggle2" class="darkModeToggle">
    <label for="darkModeToggle2" class="darkModeLabel">
      <img class="svg-img" src="../elements/dm.svg">
    </label>
  </div>
</div>

<main>
<!--#0-->

<!--#1-->
  <section class="menu">
    <button class="filter-btn showSectionButton" data-filter="section1">Chi siamo</button>
    <button class="filter-btn showSectionButton" data-filter="section2">Team</button>
    <button class="filter-btn showSectionButton" data-filter="section3">Lavora con noi</button>
  </section>

<!--#2-->
  <section class="mono news-section section1">
      <h3>PAN Associati S.R.L. nasce a Milano nel 2001 costituita da un team multidisciplinare di professionisti (architetti, paesaggisti, agronomi, forestali, ingegneri). Soci fondatori di riferimento sono Gaetano Selleri, Benedetto Selleri, Giovanni Sanesi. Operiamo nei settori della progettazione architettonica e del paesaggio, della pianificazione territoriale e della consulenza in campo ambientale sia in Italia che all'estero.</h3>

      <h3>Nel settore del paesaggio (e ambientale) PAN è studio di riferimento con un portfolio che include progetti in aree naturali, parchi e spazi urbani, grandi opere infrastrutturali, restauro di parchi e giardini storici, riqualificazione ecologica di aree degradate, forestazione urbana, giardini pensili e verticali, pianificazione territoriale.</h3>

      <h4 style="margin-top: 100px;">Progettiamo oggi<br>i paesaggi di domani</h4>

      <p>L'approccio di Pan Associati è profondamente radicato nel rispetto per l'ambiente e mira a creare spazi che non solo soddisfino le esigenze attuali ma siano anche resilienti e adatti alle generazioni future.</p>
      <p>PAN adotta un approccio multidisciplinare che fonde competenze tecniche e teoriche avanzate collaborando in modo integrato e sistematico con colleghi paesaggisti, ingegneri, naturalisti, architetti. Attraverso l’utilizzo di tecniche che integrano la natura come strumento principale di innovazione e rigenerazione riduciamo gli impatti ambientali e promuoviamo la lotta contro i cambiamenti climatici. Applichiamo i principi di ecologia urbana nei nostri progetti, promuovendo la biodiversità attraverso la creazione di nuovi habitat ed ecosistemi.</p>
      <p>Collaboriamo strettamente con le comunità, gli stakeholder e gli esperti ambientali per garantire che ogni spazio da noi creato contribuisca attivamente alla rigenerazione ambientale e al miglioramento della vita urbana.</p>

      <h1>Progettazione e direzione lavori</h1>
      <p>L’attività di progettazione, svolta sia nel settore dell’edilizia pubblica che privata, è seguita in tutte le sue fasi, dalla progettazione preliminare alla direzione lavori e coordinamento sicurezza in fase di progettazione ed esecuzione. Pan può vantare nel suo portfolio la realizzazione di numerose opere complesse, che includono componenti ingegneristiche, architettoniche oltre che ad paesaggistiche ed agronomiche.</p>
      <h1>Consulenza ambientale</h1>
      <p>Oltre che alla progettazione PAN Associati si occupa di servizi legati alla consulenza ambientale. Offriamo consulenze specialistiche, tra cui studi di fattibilità, due diligence, analisi agronomiche, censimenti e analisi botaniche e forestali, studi urbanistici, verifiche e studi ambientali (Via, Vinca, Relazioni paesaggistiche etc..) per l’ottenimento di autorizzazioni ambientali di piani e progetti.</p>
  </section>
  <section class="mono news-section section1">

      <div class="partners-wall">
        <a href="https://milanotangenziali.it/"><img class="svg-img partner" src="../library/studio/partners/01.svg"></a>
        <a href="https://mmspa.eu/"><img class="svg-img partner" src="../library/studio/partners/02.svg"></a>
        <a href="https://go-fit.it/"><img class="svg-img partner" src="../library/studio/partners/03.svg"></a>
        <a href="https://www.fondazionefieramilano.it/it/index.html"><img class="svg-img partner" src="../library/studio/partners/04.svg"></a>
        <a href="https://www.ferrovienord.it/"><img class="svg-img partner" src="../library/studio/partners/05.svg"></a>
        <a href="https://www.csvlombardia.it/milano/"><img class="svg-img partner" src="../library/studio/partners/06.svg"></a>
        <a href="https://www.comune.vicenza.it/"><img class="svg-img partner" src="../library/studio/partners/07.svg"></a>
        <a href="https://www.comune.taranto.it/"><img class="svg-img partner" src="../library/studio/partners/08.svg"></a>
        <a href="https://www.comune.milano.it/"><img class="svg-img partner" src="../library/studio/partners/09.svg"></a>
        <a href="https://comune.messina.it/it"><img class="svg-img partner" src="../library/studio/partners/10.svg"></a>
        <a href="https://www.comune.alessandria.it/homepage"><img class="svg-img partner" src="../library/studio/partners/11.svg"></a>
        <a href="https://www.brianzacque.it/"><img class="svg-img partner" src="../library/studio/partners/12.svg"></a>
        <a href="https://www.bmsprogetti.it/it/"><img class="svg-img partner" src="../library/studio/partners/13.svg"></a>
        <a href="https://barrecaelavarra.com/"><img class="svg-img partner" src="../library/studio/partners/14.svg"></a>
      </div>
  </section>
<!--
  <section class="mono news-section section2">
      <h2>Team</h2>
      <div class="container">
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Gaetano Selleri</p>
          <p class="note">Architetto</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Gaetano Selleri</p>
          <p class="note">Architetto</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Benedetto Selleri</p>
          <p class="note">Dottore forestale</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Mario Poggi</p>
          <p class="note">Ingegnere</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Lucia Saja</p>
          <p class="note"></p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Lorenzo Baldini</p>
          <p class="note">Architetto paesaggista</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Lorenzo Micucci</p>
          <p class="note">Architetto</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Gabriele Donzelli</p>
          <p class="note">Architetto</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Francesco Maglia</p>
          <p class="note">Architetto paesaggista</p>
        </div>
        <div class="item">
          <img class="portrait" src="../library/studio/500x500.jpg">
          <p>Sara Valassina</p>
          <p class="note">Interior and Spatial Designer </p>
        </div>
      </div>
  </section>

  <section class="mono news-section section2">
      <h2>Hanno lavorato con noi</h2>
      <div id="list">
        <p class="note">Sara Vergani</p>
        <p class="note">Mattia Locatelli</p>
        <p class="note">Giulia Olivetti</p>
        <p class="note">Maria Luisa Carloni</p>
        <p class="note">Davide Bossi</p>
        <p class="note">Boris Zlatkov</p>
        <p class="note">Stefano Bianchi</p>
        <p class="note">Agnese Schedoni</p>
        <p class="note">Luca Ciliani</p>
        <p class="note">Flavio Anglani</p>
        <p class="note">Giulia Sicignano</p>
        <p class="note">Simone Milani</p>
        <p class="note">Flavia Iandoli</p>
        <p class="note">Andrea Piantoni</p>
        <p class="note">Pietro Amato</p>
        <p class="note">Gwenaëlle Charrier</p>
        <p class="note">Gaia Pozzi</p>
        <p class="note">Valentina Bacco</p>
        <p class="note">Sofia Parolini</p>
        <p class="note">Chiara Osticioli</p>
        <p class="note">Roberto Colombani</p>
        <p class="note">Benedetta Concetti</p>
        <p class="note">Carine Deschamps</p>
        <p class="note">Elena Soldati</p>
        <p class="note">Stefano Diene</p>
        <p class="note">Camilla Escobar</p>
        <p class="note">Valentina Fermi</p>
        <p class="note">Mauro Fassino</p>
        <p class="note">Roberta Galeni</p>
        <p class="note">Benedetta Govi</p>
        <p class="note">Elena Guiscardo</p>
        <p class="note">Giampaolo Manfrini</p>
        <p class="note">Diletta Masiello</p>
        <p class="note">Amanda Molinelli</p>
        <p class="note">Edgardo Pavesi</p>
        <p class="note">Francesco Pastorelli</p>
        <p class="note">Chiara Patti</p>
        <p class="note">Angela Pignedoli</p>
        <p class="note">Katia Scuteri</p>
        <p class="note">Andrea Tosini</p>
        <p class="note">Viola Corbari</p>
        <p class="note">Alessio Carlini</p>
      </div>
  </section>
-->
  <section class="mono news-section section3">
      <h3>In un contesto collaborativo, PA+N Associati ti offre l'opportunità di far parte di un team dinamico, dove la tua crescita personale e professionale è al centro della nostra attenzione. Il nostro studio, focalizzato sull'innovazione e la ricerca, si impegna a trasformare ogni progetto in un'avventura di scoperta. Collaborerai con un gruppo di professionisti appassionati, impegnati nel plasmare il futuro dell'architettura attraverso la progettazione e la gestione dei progetti.</h3>
  </section>
<!--  
  <section class="mono news-section section3">
      <h2>Posizione aperte</h2>
      <p>Benvenuti nella sezione delle opportunità nella nostra azienda, dove il talento si unisce alla passione per creare un futuro straordinario insieme. Esplora le posizioni aperte e preparati a dare il via alla tua prossima avventura professionale con noi. Siamo pronti ad accogliere individui motivati e ambiziosi che desiderano fare la differenza nel loro lavoro e nella vita di chi ci circonda.</p>
      <div class="box">
        <button class="divtoggler" onclick="toggleDiv('div1')">Architetto del paesaggio</button>
        <button class="divtoggler" onclick="toggleDiv('div2')">Toggle Div 2</button>
      </div>
      <div class="toggle-div" id="div1">
        <h1>Responsabilità</h1>
        <ul class="list">
        <li>Partecipazione attiva a tutte le fasi del processo di progettazione.</li>
        <li>Collaborare con il team nella progettazione e sviluppo di progetti paesaggistici e di riqualificazione urbana.</li>
        <li>Contribuire con idee innovative e soluzioni sostenibili ai progetti in corso.</li>
        <li>Buone capacità di ideazione del concept progettuale.</li>
        <li>Elaborazione grafica e testuale per le diverse fasi di progetto.</li>
        </ul>
        <h1>Qualifiche</h1>
        <ul class="list">
        <li>Laurea in Architettura o Architettura del Paesaggio.</li>
        <li>Esperienza professionale di almeno 1-3 anno nel settore.</li>
        <li>Buona conoscenza dei principali software di progettazione e modellazione ( Autocad, suite Adobe, Office, eventuali software per la computistica, SketchUp, la conoscenza di modellazione in BIM sarà considerata un Plus).</li>
        <li>Capacità di lavorare in team e di problem solving.</li>
        <li>Buone capacità organizzative di intraprendenza.</li>
        <li>Buone capacità comunicative e di presentazione.</li>
        </ul>
      </div>
  </section>
-->
  <section class="mono news-section section3">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <p>Nome:</p>
        <input class="fill" type="text" id="name" name="name" placeholder="Maria Rossi" required>
        <p>Email:</p>
        <input class="fill" type="email" id="email" name="email" placeholder="mariarossi@esempio.it" required>
        <p>Messagio:</p>
        <textarea id="message" name="message" placeholder="Ciao associati!" required></textarea>
        <label class="file-label" for="document">+ Carica un curriculum</label>
        <input type="file" id="document" name="document" accept=".pdf,.doc,.docx" required>
        <input class="send" type="submit" value="Invia candidatura &#8594;">
      </form>
  </section>
</main>

<footer>
  <p class="note"><a class="text-link" href="https://maps.app.goo.gl/4BmQPbvBmLEBtHKx5">Via Don Carlo Porro 6 - 20128 Milano (MI) - Italia</a>
  
  <p class="note">Tel:&nbsp;<a class="text-link" href="tel:0039022578982">0039 02 257 8982</a> - Email:&nbsp;<a class="text-link" href="mailto:studio@panassociati.it">studio@panassociati.it</a> - Pec:&nbsp;<a class="text-link" href="mailto:studio.panassociati@pec.it">studio.panassociati@pec.it</a></p>

  <p class="note"><a href="https://www.facebook.com/panassociati/">Facebook</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="https://www.youtube.com/channel/UCbgIvdVyFjuWLhSequXO4Pg">Youtube</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="https://it.linkedin.com/company/pan-associati">LinkedIn</a></p>

  <div style="height: 25px;"></div>
  <a href="https://www.accredia.it/"><img class="svg-img accred" src="../elements/accredia.svg"></a>
  <a href="https://www.sgs.com/it-it"><img class="svg-img accred" src="../elements/sgs.svg"></a>
  <p class="note">Qualità ISO 9001 - 2008.<br>Questa certificazione di qualità consente alla società di garantire l’alta qualità del servizio offerto ai loro clienti.</p>
  <div style="height: 25px;"></div>

  <p class="note">PAN Associati s.r.l.&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;© Copyright 2024&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class="text-link" href="privacy">Privacy e Cookie Policy</a></p>
</footer>

<script src="../scripts/script-page-shower.js"></script>
</body>
</html>