<?php
include "bd.inc.php";

function obtenirUtilisateurParId($id) {
    $conn = connexionPDO();
    $query = 'SELECT * FROM users WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function mettreAJourUtilisateur($id, $username, $firstName, $lastName, $phoneNumber, $address, $postalCode) {
    $conn = connexionPDO();
    $query = 'UPDATE users SET username = ?, firstName = ?, lastName = ?, phoneNumber = ?, address = ?, postalCode = ? WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->execute([$username, $firstName, $lastName, $phoneNumber, $address, $postalCode, $id]);
    
    return $stmt->rowCount();
}
?>