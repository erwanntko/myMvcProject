<?php
// Démarrez la session
session_start();

// Création de racine
$racine = __DIR__ . '/..';

// Inclusions des fichiers nécessaires
include_once "$racine/modele/bd.logister.inc.php";
include_once "$racine/modele/bd.inc.php";

// Gérer la requête POST pour l'inscription
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == 'jeton_logister_inscription') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $postalCode = $_POST['postalCode'];
        $role = $_POST['role'];

        if (empty($username) || empty($password) || empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($address) || empty($postalCode) || empty($role))  {
            header("Location: erreur.php?error=empty_fields");
            exit();
        }

        if (utilisateurExiste($username)) {
            header("Location: erreur.php?error=user_exists");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if (creerUtilisateur($username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode, $role)) {
            
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['phoneNumber'] = $phoneNumber;
            $_SESSION['address'] = $address;
            $_SESSION['postalCode'] = $postalCode;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            
            header("Location: monCompte.php");
            exit();
        } else {
            header("Location: erreur.php?error=failed_create_user");
            exit();
        }
    }
    
    // Gérer la requête POST pour la connexion
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == 'jeton_logister_register') {
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
        
        if (empty($username) || empty($password)) {
            header("Location: erreur.php?error=empty_fields");
            exit();
        }
        
        if (traiterConnexion($username, $password)) {
            $userData = obtenirDonneesUtilisateur($username);
            
            if ($userData) {
                
                $_SESSION['username'] = $username;
                $_SESSION['firstName'] = $userData['firstName'];
                $_SESSION['lastName'] = $userData['lastName'];
                $_SESSION['phoneNumber'] = $userData['phoneNumber'];
                $_SESSION['address'] = $userData['address'];
                $_SESSION['postalCode'] = $userData['postalCode'];
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['role'] = $userData['role'];
                
                header("Location: monCompte.php");
                exit();
            }
        }
    }
}

// Inclusions des vues
include_once "$racine/vue/vueLogister.php";
?>