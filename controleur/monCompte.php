<?php
// Démarrez la session
session_start();

//Création de racine
$racine = __DIR__ . '/..';

// Inclusions des bdd
include_once "$racine/modele/bd.inc.php";

// Vérifier que l'utilisateur est connecté en vérifiant les données de session si non il renvoie vers logister 
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstName'] ?? '';
    $lastName = $_SESSION['lastName'] ?? '';
    $phoneNumber = $_SESSION['phoneNumber'] ?? '';
    $address = $_SESSION['address'] ?? '';
    $postalCode = $_SESSION['postalCode'] ?? '';
    $role = $_SESSION['role'] ?? '';
} else {
    header("Location: logister.php");
    exit();
}

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vueCompte.php";
?>