<h1><?php if (isset($_SESSION["user"])) : ?>Modifier votre profil<?php else : ?>Inscription sur le site<?php endif ?></h1>
<form method="post" action="">
    <fieldset>
        <legend><?php if (isset($_SESSION["user"])) : ?>Modifier le profil<?php else : ?>Inscription<?php endif ?></legend>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="Nom" name="nom" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurLastName ?><?php endif ?>">
            <?php if (isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prénom</label>
            <input type="text" placeholder="Prénom" class="form-control" id="Prenom" name="prenom" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurFirstName ?><?php endif ?>">
            <?php if (isset($messageError["prenom"])) : ?><small><?= $messageError["prenom"] ?></small><?php endif ?>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" <?php if (isset($_SESSION["user"])) : ?>disabled<?php endif ?> placeholder="Email" class="form-control" id="Email" name="email" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurEmail ?><?php endif ?>">
            <?php if (isset($messageError["Email"])) : ?><small><?= $messageError["Email"] ?></small><?php endif ?>
        </div>
        <?php if (!isset($_SESSION['user'])) : ?>
            <div class="mb-3">
                <label for="Password" class="form-label">Mot de passe</label>
                <input type="<?php if (isset($_SESSION["user"])) : ?>text<?php else : ?>password<?php endif ?>" placeholder="Mot de passe" class="form-control" id="Password" name="mot_de_passe" value="">
                <?php if (isset($messageError["mot_de_passe"])) : ?><small><?= str_replace("_", " ", $messageError["mot_de_passe"]) ?></small><?php endif ?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <label for="section">Classe</label>
            <select name="section" id="section" onchange="toggleAnnee(this.value);">
                <option disabled value="0">----</option>
                <?php foreach ($sections as $section) : ?>
                    <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->sectionId !== $ID_PROF && $section->sectionId === $ID_PROF) : ?>disabled<?php endif ?> <?php if (isset($_SESSION['user']) && $_SESSION["user"]->sectionId == $section->sectionId) : ?>selected<?php endif ?> value="<?= $section->sectionId ?>"><?= $section->sectionIntitule ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div id="divAnnee" class="mb-3 <?php if (!isset($_SESSION['user']) || $_SESSION["user"]->sectionId === $ID_PROF) : ?>noneDisplay<?php endif ?>">
            <label for="annee">Année</label>
            <select name="annee" id="annee">
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "1") : ?>selected<?php endif ?> value="1">1</option>
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "2") : ?>selected<?php endif ?> value="2">2</option>
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "3") : ?>selected<?php endif ?> value="3">3</option>
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "4") : ?>selected<?php endif ?> value="4">4</option>
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "5") : ?>selected<?php endif ?> value="5">5</option>
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "6") : ?>selected<?php endif ?> value="6">6</option>
                <option <?php if (isset($_SESSION['user']) && $_SESSION["user"]->utilisateurAnnee == "7") : ?>selected<?php endif ?> value="7">7</option>
            </select>
        </div>
        <div>
            <button name="btnEnvoi" class="btn btn-primary" value="envoyer"><?php if (isset($_SESSION["user"])) : ?>Modifier<?php else : ?>Envoyer<?php endif ?></button>
        </div>
    </fieldset>
</form>