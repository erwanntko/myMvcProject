<?php
include_once "bd.inc.php";

function ajouterReservation($user_id, $ville, $reservation_date) {

    $conn = connexionPDO();
    $query = "INSERT INTO reservations (username, ville, reservation_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $user_id);
    $stmt->bindParam(2, $ville);
    $stmt->bindParam(3, $reservation_date);
    return $stmt->execute();
}
?>