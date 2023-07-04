<h1>Page profil</h1>
<p><span>Nom : </span><?= $_SESSION["user"]->utilisateurLastName ?></p>
<p><span>Prénom : </span><?= $_SESSION["user"]->utilisateurFirstName ?></p>
<p><span>Email : </span><?= $_SESSION["user"]->utilisateurEmail ?></p>
<a href="updateProfil">Modifier</a>
<a href="deleteProfil">Supprimer</a>