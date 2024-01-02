<?php 
$pageTitle = 'Chi Sono';
include('header.php'); 

$aboutMeContent = [
    'image' => 'IMG/FotoPersonale.jpg',
    'title' => 'Chi Sono',
    'paragraphs' => [
        'Sono un appassionato professionista del web.',
        'La mia missione è fornire soluzioni digitali innovative e personalizzate che soddisfino le esigenze uniche di ciascun cliente.'
    ]
];
?>

<div class="grid extra-content">
    <section class="about-me">
        <img src="<?php echo $aboutMeContent['image']; ?>" class="img-res img-round" alt="Foto Personale">
        <h2><?php echo $aboutMeContent['title']; ?></h2>
        <div class="columns">
            <?php foreach ($aboutMeContent['paragraphs'] as $paragraph) : ?>
                <p><?php echo $paragraph; ?></p>
            <?php endforeach; ?>
        </div>

        <div class="button-wrapper">
            <p>Per vedere alcuni dei miei lavori effettuati, clicca qui:</p>
            <a href="lavori-effettuati.php" class="button">Lavori Effettuati</a>
        </div>
    </section>
</div>

<h2>Contattami</h2>
<p>Hai domande o desideri maggiori informazioni sui servizi offerti?</p>
<p>Clicca qui :</p>
<a href="contatti.php" class="button-contact">Contattami</a>

<?php include('footer.php'); ?>

