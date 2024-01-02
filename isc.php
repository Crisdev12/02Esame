<?php
// Inizializza una variabile per tener traccia dello stato di validazione
$formValido = true;
$errori = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validazione e pulizia dei dati
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $messaggio = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telefono = filter_input(INPUT_POST, "telefono", FILTER_SANITIZE_NUMBER_INT);

    // Verifica se l'indirizzo email è valido
    if ($email === false) {
        $formValido = false;
        $errori[] = "Indirizzo email non valido";
    }

    // Verifica se il numero di telefono è valido
    if (!preg_match("/^\d{10,15}$/", $telefono)) {
        $formValido = false;
        $errori[] = "Numero di telefono non valido";
    }

    // Verifica se i campi obbligatori sono stati compilati
    if (empty($nome) || empty($email) || empty($messaggio) || empty($telefono)) {
        $formValido = false;
        $errori[] = "Compila tutti i campi obbligatori.";
    }

    // Continua solo se il form è stato validato correttamente
    if ($formValido) {
        // Salvataggio dati in un file testuale
        $testo = "Nome: $nome\nEmail: $email\nTelefono: $telefono\nMessaggio: $messaggio\n\n";

        // Assicurati che il percorso del file sia corretto e che il server abbia i permessi
        $percorsoFile = "contatti.txt";

        // Verifica i permessi della directory
        if (!is_writable(dirname($percorsoFile))) {
            $formValido = false;
            $errori[] = "La directory non ha i permessi di scrittura.";
        }

        // Verifica se il file esiste e può essere scritto
        if (file_exists($percorsoFile) && !is_writable($percorsoFile)) {
            $formValido = false;
            $errori[] = "Il file non ha i permessi di scrittura.";
        }

        // Salva i dati nel file solo se il form è valido
        if ($formValido && file_put_contents($percorsoFile, $testo, FILE_APPEND) !== false) {
            // Redirect alla pagina di ringraziamento
            header("Location: grazie.html");
            exit();
        } else {
            $formValido = false;
            $errori[] = "Errore durante il salvataggio dei dati.";
        }
    }
}
?>

<!-- Blocco per visualizzare gli errori -->
<?php
if (!$formValido && !empty($errori)) {
    echo "<div style='color: red;'>";
    foreach ($errori as $errore) {
        echo "<p>$errore</p>";
    }
    echo "</div>";
}
?>


