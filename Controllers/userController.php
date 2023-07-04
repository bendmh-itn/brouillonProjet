<?php

require_once("Models/sectionModel.php");
require_once("Models/userModel.php");

$userModel = new userModel($dbh);
$sectionModel = new sectionModel($dbh);

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/connexion") {
    if (isset($_POST['btnEnvoi'])) {
        $messageErreur = verifEmptyData();
        if (!$messageErreur) {
            $connected = $userModel->connecterUtilisateur($_POST['email'], $_POST['mot_de_passe']);
            if ($connected) {
                header("location:/");
            } else {
                $wrong = true;
            }
        }
    }
    $title = "connexion";
    $template = "Views/Users/connexion.php";
    require_once "Views/base.php";
} elseif ($uri === "/deconnexion") {
    session_destroy();
    header("location:/");
} elseif ($uri === "/inscription") {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if (!$messageError) {
            if ($_POST['section'] === $ID_PROF) {
                $role = "prof";
                $annee = "0";
            } else {
                $role = "élève";
                $annee = $_POST["annee"];
            }
            $userModel->enregistrerNouvelUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'], $_POST['section'], $annee);
            header('location:/connexion');
        }
    }
    $title = "Inscription";
    $sections = $sectionModel->selectAllSections($dbh);
    $template = "Views/Users/inscriptionOrEditProfil.php";
    require_once "Views/base.php";
} elseif ($uri === "/updateProfil") {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if (!$messageError) {
            if ($_POST['section'] === $ID_PROF) {
                $role = "prof";
            } else {
                $role = "élève";
            }
            if (isset($_POST["annee"])) {
                $annee = $_POST["annee"];
            } else {
                $annee = null;
            }
            $userModel->enregistrerNouvelUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'], $_POST['section'], $annee);
            header('location:/profil');
        }
    }
    $title = "Modifier mon profil";
    $sections = $sectionModel->selectAllSections();
    $template = "Views/Users/inscriptionOrEditProfil.php";
    require_once "Views/base.php";
} elseif ($uri === "/profil") {
    $title = "Mon profil";
    $template = "Views/Users/profil.php";
    require_once "Views/base.php";
}



function verifEmptyData()
{
    foreach ($_POST as $key => $value) {
        if (empty(str_replace(' ', '', $value))) {
            $messageError[$key] = "Votre " . $key . " est vide.";
        }
    }
    if (isset($messageError)) {
        return $messageError;
    } else {
        return false;
    }
}
