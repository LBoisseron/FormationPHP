<?php
/**
 * nous pourrons définir ici toutes les fonctions utiles à notre projet 
 * et utilisable sur toutes les pages
 */

/**
 * permet de générer une accroche
 */
function summarize($text) {
    // suppression des balises html
    $string = strip_tags($text);

    // si mon $string > 150 je continue
    if(strlen($tring > 150)) {
        $stringCut = substr($string, 0, 150);
        $string = substr($stringCut, 0, strrpos($stringCut, ' '));

    }
    return $string . '...';
}