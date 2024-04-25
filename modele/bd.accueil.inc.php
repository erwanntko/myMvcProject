<?php
include "bd.inc.php";

function getCatalogueDirectorNames() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT name FROM catalogueDirector;");
        $req->execute();
        
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

function getCatalogueDirectorFileNames() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT fileNameImages FROM catalogueDirector;");
        $req->execute();
        
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

function getCatalogueData() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM catalogue ORDER BY pays;");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

function getVoyagesParPays() {
    $catalogueData = getCatalogueData();


    $catalogueParPays = array();
    foreach ($catalogueData as $data) {
        $pays = $data['pays'];
        if (!isset($catalogueParPays[$pays])) {
            $catalogueParPays[$pays] = array();
        }
        $catalogueParPays[$pays][] = $data;
    }

    return $catalogueParPays;
}
?>