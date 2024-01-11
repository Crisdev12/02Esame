<?php
$pageTitle = 'Contatti';
include('header.php');

$formValido = true;
$errori = array();
$formDati = array();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cognome = filter_input(INPUT_POST, "cognome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $messaggio = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telefono = filter_input(INPUT_POST, "telefono", FILTER_SANITIZE_NUMBER_INT);

    if ($email === false) {
        $formValido = false;
        $errori[] = "L'indirizzo email non è valido. Assicurati di inserire un indirizzo email corretto.";
    }

    if (!preg_match("/^\d{10,15}$/", $telefono)) {
        $formValido = false;
        $errori[] = "Il numero di telefono non è valido. Inserisci un numero di telefono valido.";
    }

    if (empty($nome) || empty($cognome) || empty($email) || empty($messaggio) || empty($telefono)) {
        $formValido = false;
        $errori[] = "Compila tutti i campi obbligatori.";
    }

    if ($formValido) {
        // Salva i dati in un file solo se il form è valido
        $testo = "Nome: $nome\nCognome: $cognome\nEmail: $email\nTelefono: $telefono\nMessaggio: $messaggio\n\n";
        $percorsoFile = "contatti.txt";

        if (!is_writable(dirname($percorsoFile))) {
            $formValido = false;
            $errori[] = "La directory non ha i permessi di scrittura.";
        }

        if ($formValido && file_put_contents($percorsoFile, $testo, FILE_APPEND) === false) {
            $formValido = false;
            $errori[] = "Errore durante il salvataggio dei dati.";
        }

        // Se il form è valido, esegui il reindirizzamento
        if ($formValido) {
            header("Location: grazie.html");
            exit();
        }
    } else {
        $formDati = array(
            'nome' => $nome,
            'cognome' => $cognome,
            'email' => $email,
            'note' => $messaggio,
            'telefono' => $telefono,
            'accettazione' => isset($_POST['accettazione']) ? $_POST['accettazione'] : ''
        );
    }
}
?>

<div class="grid extra-content">
    <section class="contattami">
        <h1>Contattami</h1>
        <h3>Hai domande o desideri maggiori informazioni sui servizi offerti? Sarà un piacere per me rispondere alle tue curiosità e condividere idee innovative.</h3>

        <!-- Form Contatti -->
        <form action="contatti.php" method="post" class="contact-form">
            <?php
            $jsonFile = file_get_contents('contatti.json');
            $contatti = json_decode($jsonFile, true);

            if ($jsonFile === false || $contatti === null) {
                echo 'Errore nella lettura del file JSON.';
                exit();
            }

            foreach ($contatti as $field) {
                echo '<div class="form-group">';
                echo '<label for="' . $field['name'] . '">' . $field['label'] . ':</label>';
                if ($field['type'] === 'textarea') {
                    echo '<' . $field['type'] . ' id="' . $field['name'] . '" name="' . $field['name'] . '" required="" placeholder="' . $field['placeholder'] . '">' . ($formDati[$field['name']] ?? '') . '</' . $field['type'] . '>';
                } else {
                    echo '<input id="' . $field['name'] . '" name="' . $field['name'] . '" required="" type="' . $field['type'] . '" placeholder="' . $field['placeholder'] . '" value="' . ($formDati[$field['name']] ?? '') . '">';
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

            <!-- Blocco per visualizzare gli errori -->
            <?php
            if (!$formValido && !empty($errori)) {
                echo "<div style='color: red;'>";
                foreach ($errori as $errore) {
                    echo "<p style='color: red;'>$errore</p>";
                }
                echo "</div>";
            }
            ?>
        </form>
    </section>
</div>

<?php include('footer.php'); ?>

