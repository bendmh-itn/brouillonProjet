<h1>Bienvenue sur le nouveau site pour les élèves</h1>
<h2>Liste de vos <?php if ($_SESSION['user']->sectionId === $ID_PROF) : ?>sections<?php else : ?>cours<?php endif ?></h2>
<?php var_dump($_SESSION) ?>
<div>
    <?php foreach ($elements as $element) : ?>
        <div>
            <?php if ($_SESSION['user']->sectionId === $ID_PROF) : ?>
                <p><a href="/section?sectionId=<?= $element->sectionId ?>"><?= $element->sectionIntitule ?></a></p>
            <?php else : ?>
                <p><?= $element->matiereIntitule ?></p>
            <?php endif ?>
        </div>
    <?php endforeach ?>
</div>