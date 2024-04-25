<?php
include "bd.inc.php";

function recupererTousLesUtilisateurs() {
    $pdo = connexionPDO();
    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function mettreAJourUtilisateur($donnees) {
    $pdo = connexionPDO();
    $stmt = $pdo->prepare('UPDATE users SET username = ?, password = ?, firstName = ?, lastName = ?, address = ?, phoneNumber = ?, postalCode = ? WHERE id = ?');
    
    $stmt->execute([
        $donnees['username'],
        password_hash($donnees['password'], PASSWORD_BCRYPT),
        $donnees['firstName'],
        $donnees['lastName'],
        $donnees['address'],
        $donnees['phoneNumber'],
        $donnees['postalCode'],
        $donnees['id']
    ]);
}

function supprimerUtilisateur($id) {
    $pdo = connexionPDO();
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'supprimer') {
    $id = $_POST['id'];

    supprimerUtilisateur($id);

    header('Location: panel.php');
    exit;
}

?>