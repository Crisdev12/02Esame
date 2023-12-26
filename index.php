<?php 
$pageTitle = 'Home Page';
include('header.php'); 
?>

<div class="cover" style="background-image: url('IMG/hero.jpg');">
    <div class="cover__content">
        <h1>Benvenuto nel Mio sito web</h1>
        <h2 class="font-normal">Scopri il mio mondo e lasciati ispirare.</h2>
        <p>Ciao, sono Cristiano, un appassionato di Informatica pronto a trasformare le idee in realtà. Con un background solido in web design e sviluppo, mi dedico a creare soluzioni digitali uniche e coinvolgenti.</p>
        <a href="lavori-effettuati.php" class="button">Esplora i miei lavori</a>
    </div>
</div>

<section class="skills">
    <h2>Il Mio Percorso di Studi</h2>
    <p>Finora ho studiato e acquisito competenze in diversi campi, focalizzandomi principalmente su HTML, CSS e Photoshop. Di seguito puoi trovare una panoramica delle mie competenze principali:</p>

    <?php
    $skills = [
        ['HTML', 'html.png'],
        ['CSS', 'css.png'],
        ['PHOTOSHOP', 'photoshop.png']
    ];

    foreach ($skills as $skill) {
        echo '<div class="skill-item">';
        echo '<h3>' . $skill[0] . '</h3>';
        echo '<img src="IMG/' . $skill[1] . '" alt="' . $skill[0] . ' Icona">';
        echo '</div>';
    }
    ?>
</section>

<h2>Contattami</h2>
<p>Hai domande o desideri maggiori informazioni sui servizi offerti?</p>
<p>Clicca qui :</p>
<a href="contatti.php" class="button-contact">Contattami</a>

<?php include('footer.php'); ?>
