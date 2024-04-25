<?php
// Création de racine
$racine = __DIR__ . '/..';

// Inclusions des fichiers nécessaires
include_once "$racine/modele/bd.maj.inc.php";
include_once "$racine/modele/bd.inc.php";

// Récupération formulaire pour lancer une fonction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $postalCode = $_POST['postalCode'];

    $result = mettreAJourUtilisateur($id, $username, $firstName, $lastName, $phoneNumber, $address, $postalCode);

    if ($result) {
        header('Location: panel.php');
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $user = obtenirUtilisateurParId($id);

    if ($user) {
        include_once "$racine/vue/vueMajUtilisateur.php";
    }
}
?>
