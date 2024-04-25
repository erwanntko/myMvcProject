<?php
//Démarage de la session
session_start();

//Création de racine
$racine = __DIR__ . '/..';

// Inclusions des bdd
include "$racine/modele/bd.inc.php";
include "$racine/modele/bd.accueil.inc.php";
include "$racine/modele/bd.panel.inc.php";

//Initiation des variables
$catalogueDirectorName = getCatalogueDirectorNames();
$catalogueDirectorFileNames = getCatalogueDirectorFileNames();
$catalogueParPays = getVoyagesParPays();

// Inclusions des vues
include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueAccueil.php";
?>