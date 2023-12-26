<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $jsonFile = file_get_contents('DATA/lavori.json');

  if ($jsonFile === false) {
    echo 'Errore nella lettura del file JSON.';
  } else {
    // Decodifica il file JSON in un array PHP
    $lavori = json_decode($jsonFile, true);

    if ($id >= 1 && $id <= count($lavori)) {
      // Estrae il lavoro specifico
      $lavoro = $lavori[$id - 1];
?>
      <!DOCTYPE html>
      <html lang="it">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Lavoro Singolo </title>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="IMG/favicon.png">
        <link rel="stylesheet" href="CSS/style.min.css">
      </head>

      <body>

        <section class="top-nav">
          <div>
            <a href="index.php"><img src="IMG/logo1.png" alt="Il tuo Logo"></a>
          </div>
          <input id="menu-toggle" type="checkbox">
          <label class="menu-button-container" for="menu-toggle">
            <span class="menu-button"></span>
          </label>

          <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="chi-sono.php">Chi Sono</a></li>
            <li><a href="servizi-offerti.php">Servizi Offerti</a></li>
          </ul>
        </section>

        <h2>LAVORO CON PHOTOSHOP</h2>
        <p>Scopri la magia della grafica digitale con questo progetto. Realizzato con maestria attraverso l'utilizzo di Photoshop, questo lavoro è un'ode alla creatività e alla precisione. Naviga tra colori accattivanti, giochi di luci e ombre sapientemente messe in opera, mentre l'arte digitale prende vita. Ogni dettaglio è plasmato con cura, portando alla luce l'intramontabile connubio tra tecnologia e espressione artistica.</p>

        <div class="grid extra-content">
          <h1><?= $lavoro['titolo'] ?></h1>

          <img class="img-res lavoro-singolo-image" src="<?= $lavoro['immagine'] ?>" alt="<?= $lavoro['titolo'] ?>" style="max-width: 45%; height: auto; display: block; margin: 0 auto;">
          <p><?= $lavoro['descrizione'] ?></p>

          <a href="lavori-effettuati.php" class="button">Torna ai Lavori Effettuati</a>
        </div>

        <?php include('footer.php'); ?>

<?php
    } else {
      echo 'Lavoro non trovato.';
    }
  }
} else {
  echo 'ID non specificato.';
}
?>