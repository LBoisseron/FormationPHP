<?php
/**
 * CONSIGNE/ CREER 3 FONCTIONS 
 *  1. getArticles(): permet de retourner tous les articles de la BDD
 *  2. getArticleById() : récupérer un article grâce à son id
 *  3. getArticlesByCategorieId() : récupérer les articles d'une catégorie, grâce à id de la catégorie
 */

// 1.
function getArticles() {
    global $bdd;
    $query = $bdd->query('SELECT * FROM article ORDER BY id_article DESC');
    return $query->fetchAll();
}

// 2.
function getArticleById($article_id) {
    global $bdd;
    $sql = 'SELECT * FROM article WHERE id_article = :id';
    $query = $bdd->prepare($sql);
    $query->bindvalue(':id', $article_id);
    $query->execute();

    return $query->fetch();
}
// 3.
function getArticlesByCategorieId($categorie_id) {
    global $bdd;
    $sql = 'SELECT * FROM article WHERE categorie_id = :id';
    $query = $bdd->query->prepare($sql);
    $query->bindvalue(':id', $categorie_id);
    $query->execute();

    return $query->fetchAll();
}