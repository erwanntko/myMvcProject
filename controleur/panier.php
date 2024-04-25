<?php
//Création de racine
$racine = __DIR__ . '/..';

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vuePanier.php";

// Inclusions des bdd
include_once "$racine/modele/bd.panier.inc.php";

// Force à toi cette requête marche pas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    if ($data !== NULL) {
        if (isset($data['user_id'], $data['ville'], $data['reservation_date']) && !empty($data['user_id']) && !empty($data['ville']) && !empty($data['reservation_date'])) {

            $result = ajouterReservation($data['user_id'], $data['ville'], $data['reservation_date']);
            
            if ($result) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } else {
            http_response_code(400);
            error_log('Données manquantes ou invalides : user_id = ' . $data['user_id'] . ', ville = ' . $data['ville'] . ', reservation_date = ' . $data['reservation_date']);
        }
    } else {
        http_response_code(400);
        error_log('Aucune donnée reçue');
    }
}
?>