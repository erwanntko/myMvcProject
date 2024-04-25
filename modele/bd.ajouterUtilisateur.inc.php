<?php
include_once 'bd.inc.php';

function creerUtilisateur($username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode) {

    $conn = connexionPDO();
    $query = "INSERT INTO users (username, password, firstName, lastName, address, phoneNumber, postalCode)
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $hashedPassword);
    $stmt->bindParam(3, $firstName);
    $stmt->bindParam(4, $lastName);
    $stmt->bindParam(5, $address);
    $stmt->bindParam(6, $phoneNumber);
    $stmt->bindParam(7, $postalCode);
    
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
?>