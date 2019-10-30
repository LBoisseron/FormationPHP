<?php

/**
 * retourne les catégories du site depuis la BDD
 */
function getCategories() {
    global $bdd; // récupération du $bdd dans l'espace global
    $query = $bdd->query('SELECT * FROM categorie');
    return $query->fetchAll(); // on retourne les catégories de la BDD
}

?>