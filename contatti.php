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
            $formFields = [
                ['nome', 'Il tuo nome', 'text'],
                ['cognome', 'Il tuo cognome', 'text'],
                ['email', 'La tua email', 'email'],
                ['telefono', 'Il tuo numero di telefono', 'tel'],
                ['note', 'Scrivi un messaggio', 'textarea']
            ];

            foreach ($formFields as $field) {
                echo '<div class="form-group">';
                echo '<label for="' . $field[0] . '">' . ucfirst($field[0]) . ':</label>';
                if ($field[2] === 'textarea') {
                    echo '<' . $field[2] . ' id="' . $field[0] . '" name="' . $field[0] . '" required="" placeholder="' . $field[1] . '"></' . $field[2] . '>';
                } else {
                    echo '<input id="' . $field[0] . '" name="' . $field[0] . '" required="" type="' . $field[2] . '" placeholder="' . $field[1] . '">';
                }
                echo '</div>';
            }
            ?>

            <div class="form-group">
                <input type="checkbox" id="accetto" name="accetto" required="" value="accetto">
                <label class="checkbox-label" for="accetto">Accetto l'informativa privacy e il trattamento dei miei dati in merito alla mia richiesta commerciale.</label>
            </div>

            <div class="form-group">
                <input type="checkbox" id="non-accetto" name="non-accetto" required="" value="non-accetto">
                <label class="checkbox-label" for="non-accetto">Non accetto l'informativa privacy e il trattamento dei miei dati.</label>
            </div>

            <div class="form-group">
                <button name="submit" type="submit" id="contact-submit" data-submit="...Invio">INVIA</button>
            </div>
        </form>
    </section>
</div>

<?php include('footer.php'); ?>
