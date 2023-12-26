<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validazione e pulizia dei dati
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $messaggio = htmlspecialchars($_POST["note"]);

    // Validazione dell'indirizzo email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Indirizzo email non valido";
        // Puoi anche reindirizzare l'utente ad una pagina di errore
        exit();
    }

    // Salvataggio dati in un file testuale
    $testo = "Nome: $nome\nEmail: $email\nMessaggio: $messaggio\n\n";

    // Assicurati che il percorso del file sia corretto e che il server abbia i permessi
    $percorsoFile = "contatti.txt";

    // Verifica i permessi della directory
    if (!is_writable(dirname($percorsoFile))) {
        echo "La directory non ha i permessi di scrittura.";
        // Puoi anche reindirizzare l'utente ad una pagina di errore
        exit();
    }

    // Verifica se il file esiste e può essere scritto
    if (file_exists($percorsoFile) && !is_writable($percorsoFile)) {
        echo "Il file non ha i permessi di scrittura.";
        // Puoi anche reindirizzare l'utente ad una pagina di errore
        exit();
    }

    // Salva i dati nel file
    if (file_put_contents($percorsoFile, $testo, FILE_APPEND) !== false) {
        // Redirect alla pagina di ringraziamento
        header("Location: grazie.html");
        exit();
    } else {
        echo "Errore durante il salvataggio dei dati.";
        // Puoi anche reindirizzare l'utente ad una pagina di errore
        exit();
    }
}
?>
