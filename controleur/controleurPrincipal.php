<?php
function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["logister"] = "logister.php";
    $lesActions["moncompte"] = "monCompte.php";
    $lesActions["panier"] = "panier.php";
    $lesActions["panel"] = "panel.php";

    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}
?>