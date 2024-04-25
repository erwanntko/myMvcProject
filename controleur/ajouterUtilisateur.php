<?php
// Démarrer la session
session_start();

// Définir la racine du projet
$racine = __DIR__ . '/..';

// Inclure les fichiers nécessaires
include "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.ajouterUtilisateur.inc.php";

// Inclure la vue pour ajouter un utilisateur
include "$racine/vue/vueAjouterUtilisateur.php";

// Vérifier si la requête est de type POST et exécuter une fonction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $postalCode = $_POST['postalCode'];

    if (!empty($username) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($address) && !empty($phoneNumber) && !empty($postalCode)) {
        if (utilisateurExiste($username)) {
            echo "Le nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $result = creerUtilisateur($username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode);

            if ($result) {
                header("Location: panel.php");
                exit();
            }
        }
    }
}
?>
