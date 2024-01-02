<?php
$pageTitle = 'Contatti';
include('header.php');
?>

<div class="grid extra-content">
    <section class="contattami">
        <h1>Contattami</h1>
        <h3>Hai domande o desideri maggiori informazioni sui servizi offerti? Sarà un piacere per me rispondere alle tue curiosità e condividere idee innovative.</h3>

        <!-- Form Contatti -->
        <form action="isc.php" method="post" class="contact-form">
            <?php
            // Carica i dati dal file JSON
            $jsonFile = file_get_contents('contatti.json');
            $contatti = json_decode($jsonFile, true);

            // Verifica se ci sono errori nella lettura del file JSON
            if ($jsonFile === false || $contatti === null) {
                echo 'Errore nella lettura del file JSON.';
                exit();  // Interrompi l'esecuzione in caso di errore
            }

            foreach ($contatti as $field) {
                echo '<div class="form-group">';
                echo '<label for="' . $field['name'] . '">' . $field['label'] . ':</label>';
                if ($field['type'] === 'textarea') {
                    echo '<' . $field['type'] . ' id="' . $field['name'] . '" name="' . $field['name'] . '" required="" placeholder="' . $field['placeholder'] . '"></' . $field['type'] . '>';
                } else {
                    echo '<input id="' . $field['name'] . '" name="' . $field['name'] . '" required="" type="' . $field['type'] . '" placeholder="' . $field['placeholder'] . '">';
                }
                echo '</div>';
            }
            ?>
            <div class="form-group">
                <label class="radio-label">Accetto l'informativa privacy e il trattamento dei miei dati in merito alla mia richiesta commerciale:</label>
                <input type="radio" id="accetto" name="accettazione" required="" value="accetto">
            </div>

            <div class="form-group">
                <label class="radio-label">Non accetto l'informativa privacy e il trattamento dei miei dati:</label>
                <input type="radio" id="non-accetto" name="accettazione" required="" value="non-accetto">
            </div>


            <div class="form-group">
                <button name="submit" type="submit" id="contact-submit" data-submit="...Invio">INVIA</button>
            </div>
        </form>
    </section>
</div>

<?php include('footer.php'); ?>