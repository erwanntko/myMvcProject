<?php
include "bd.inc.php";

function creerUtilisateur($username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode, $role) {
    
    $conn = connexionPDO();
    $query = "INSERT INTO users (username, password, firstName, lastName, address, phoneNumber, postalCode, role)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $hashedPassword);
    $stmt->bindParam(3, $firstName);
    $stmt->bindParam(4, $lastName);
    $stmt->bindParam(5, $address);
    $stmt->bindParam(6, $phoneNumber);
    $stmt->bindParam(7, $postalCode);
    $stmt->bindParam(8, $role);
    
    return $stmt->execute();
}

function utilisateurExiste($username) {

    $conn = connexionPDO();
    $query = "SELECT COUNT(*) FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
}

function traiterInscription() {

    $conn = connexionPDO();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $postalCode = $_POST['postalCode'];

    if (!empty($username) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($address) && !empty($phoneNumber) && !empty($postalCode)) {
        if (utilisateurExiste($conn, $username)) {

            header("Location: erreur.php?error=user_exists");
            exit();
        } else {

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            creerUtilisateur($conn, $username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode);
            
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['phoneNumber'] = $phoneNumber;
            $_SESSION['address'] = $address;
            $_SESSION['postalCode'] = $postalCode;

            header("Location: moncompte.php");
            exit();
        }
    } else {

        header("Location: erreur.php?error=empty_fields");
        exit();
    }
}

function traiterConnexion($username, $password) {

    $conn = connexionPDO();
    $query = "SELECT password FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        if (password_verify($password, $user['password'])) {
            return true;
        }
    }
}

function obtenirDonneesUtilisateur($username) {
    $conn = connexionPDO();
    $query = "SELECT id, firstName, lastName, phoneNumber, address, postalCode, role FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $userData;
}
?>