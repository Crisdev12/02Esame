<?php
$pageTitle = 'Servizi Offerti';
include('header.php');
?>

<div class="grid extra-content">
    <section class="services">
        <h2>Servizi Offerti</h2>
        <p>Offro una vasta gamma di servizi, tra cui:</p>

        <ul>
            <li>Web Design</li>
            <li>Sviluppo di Siti Web</li>
            <li>Consulenza Tecnica</li>
        </ul>

        <p>Ogni progetto è personalizzato per soddisfare le tue esigenze specifiche.</p>
    </section>

    <section class="skills">
        <h2>I Miei Servizi</h2>
        <p>Specializzato in vari settori, offro servizi che includono:</p>

        <?php
        $servicesSkills = [
            [
                'title' => 'Web Design',
                'description' => 'Creazione di design accattivanti e intuitivi per siti web.',
                'image' => 'IMG/webdesign.jpg'
            ],
            [
                'title' => 'Sviluppo di Siti Web',
                'description' => 'Sviluppo di siti web responsive e funzionali.',
                'image' => 'IMG/svluppositiweb.jpg'
            ],
            [
                'title' => 'Consulenza Tecnica',
                'description' => 'Consulenza approfondita su soluzioni tecnologiche.',
                'image' => 'IMG/consulenzatecnica.jpg'
            ]
        ];

        $servicesSkillsJSON = json_encode($servicesSkills, JSON_PRETTY_PRINT);
        
        // Salvare il file JSON nella stessa cartella della pagina PHP
        file_put_contents('servizi-offerti.json', $servicesSkillsJSON);

        foreach ($servicesSkills as $skill) {
            echo '<div class="skill-item">';
            echo '<h3>' . $skill['title'] . '</h3>';
            echo '<img src="' . $skill['image'] . '" alt="' . $skill['title'] . '">';
            echo '<p>' . $skill['description'] . '</p>';
            echo '</div>';
        }
        ?>
    </section>
</div>

<h2>Contattami</h2>
<p>Hai domande o desideri maggiori informazioni sui servizi offerti?</p>
<p>Clicca qui:</p>
<a href="contatti.php" class="button-contact">Contattami</a>

<?php include('footer.php'); ?>
