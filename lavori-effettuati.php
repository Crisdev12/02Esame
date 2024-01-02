<?php
$pageTitle = 'Lavori Effettuati';
include('header.php'); 
?>

<div class="grid extra-content">
    <h1>Lavori Effettuati</h1>
    <h2 class="font-normal">Esplora alcuni dei miei progetti recenti.</h2>
    <p>Qui troverai una selezione di lavori che ho realizzato per clienti soddisfatti.</p>

    <div class="grid hero">
        <?php
        $jsonFile = file_get_contents('lavori.json');

        // Verifica se ci sono errori nella lettura del file JSON
        if ($jsonFile === false) {
            echo 'Errore nella lettura del file JSON.';
        } else {
            // Decodifica il file JSON in un array PHP
            $lavori = json_decode($jsonFile, true);

            // Verifica se ci sono errori nella decodifica del JSON
            if ($lavori === null) {
                echo 'Errore nella decodifica del file JSON.';
            } else {
                // Loop attraverso i lavori e stampali
                foreach ($lavori as $lavoro) {
                    echo '<div class="col-33 mb-3">
                        <a href="lavoro-singolo.php?id=' . $lavoro['id'] . '" class="portfolio-item">
                            <img class="img-res img-small round" src="' . $lavoro['immagine'] . '" alt="' . $lavoro['titolo'] . '"
                                 style="max-width: 45%; height: auto;">
                            <div class="portfolio-text">
                                <h4>' . $lavoro['titolo'] . '</h4>
                                <p>' . $lavoro['descrizione'] . '</p>
                            </div>
                        </a>
                    </div>';
                }
            }
        }
        ?>
    </div>
</div>

<h2>Contattami</h2>
<p>Hai domande o desideri maggiori informazioni sui servizi offerti?</p>
<p>Clicca qui :</p>
<a href="contatti.php" class="button-contact">Contattami</a>

<?php include('footer.php'); ?>
