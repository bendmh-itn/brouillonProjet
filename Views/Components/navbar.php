<a href="/">Accueil</a>
<?php if (isset($_SESSION["user"])) : ?>
    <a href="profil">Profil</a>
    <a href="deconnexion">Déconnexion</a>
<?php else : ?>
    <a href="connexion">Connexion</a>
    <a href="inscription">Inscription</a>
<?php endif ?>