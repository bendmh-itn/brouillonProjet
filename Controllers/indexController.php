<?php

require_once("Models/sectionModel.php");
require_once("Models/matiereModel.php");


$sectionModel = new sectionModel($dbh);
$matiereModel = new matiereModel($dbh);

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    if (!isset($_SESSION['user'])) {
        header('location:/connexion');
    }
    if ($_SESSION['user']->sectionId === "4") {
        $elements = $sectionModel->selectMySections($_SESSION['user']->utilisateurId);
    } else {
        $elements = $matiereModel->selectMyMatieres($_SESSION['user']->sectionId);
    }
    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once "Views/base.php";
} elseif ($uri === "/section?sectionId=" . $_GET["sectionId"]) {
    var_dump("test");
    $elements = $matiereModel->selectMyMatieres($_GET["sectionId"]);
    var_dump($elements);
    $template = "Views/pageAccueil.php";
    require_once "Views/base.php";
}
