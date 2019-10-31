<?php
/**
 * nous pourrons définir ici toutes les fonctions utiles à notre projet 
 * et utilisable sur toutes les pages
 */

// démarrage de la session PHP
session_start();

// permet de rediriger un utilisateur sur une nouvelle page
function redirection($page) {
    header('Location:' . $page);
}

// permet de vérifier si un auteur est connecté en session
// retourne oui si un utilisateur est connecté, non si pas le cas
function estConnecte () {
    return isset( $_SESSION['auteur'] ) ? $_SESSION['auteur'] : false ;
}

// permet de générer une accroche / un résumé
function summarize($text) {
    // suppression des balises html
    $string = strip_tags($text);

    // si mon $string > 150 je continue
    if(strlen($string) > 150) {

        //je coupe ma chaîne à 150 caractères
        $stringCut = substr($string, 0, 150);

        //je m'assure de ne pas couper de mot en recherchant la position du dernier espace
        $string = substr($stringCut, 0, strrpos($stringCut, ' '));

    }
    return $string . '...';
}