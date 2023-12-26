<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Breve descrizione del tuo sito">
    <title><?= $pageTitle ?? 'Cristiano Fiananese - Sito Web' ?></title>
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
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="chi-sono.php">Chi Sono</a></li>
            <li><a href="servizi-offerti.php">Servizi Offerti</a></li>
        </ul>
    </section>
