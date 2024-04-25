<?php
// Démarrez la session
session_start();

//Création de racine
$racine = __DIR__ . '/..';

// Inclusions des bdd
include "$racine/modele/bd.inc.php";
include "$racine/modele/bd.panel.inc.php";

//Initiation des variables
$lesUsers = recupererTousLesUtilisateurs();
$role = $_SESSION['role'];

//Ne charge pas le panel si le role n'est pas Admin
if ($role !== 'Admin') {
    header("Location: /");
    exit();
}

//Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vuePanel.php";
?>