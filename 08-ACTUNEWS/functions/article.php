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
    $query = $bdd->query('SELECT * FROM article, auteur WHERE article.id_auteur = auteur.id_auteur ORDER BY article.id_article DESC');
    return $query->fetchAll();
}

// 2.
function getArticleById($id_article) {
    global $bdd;
    $sql = 'SELECT * FROM article WHERE id_article = :id_article';
    $query = $bdd->prepare($sql);
    $query->bindvalue(':id_article', $id_article);
    $query->execute();

    return $query->fetch();
}
// 3.
function getArticlesByCategorieId($id_categorie) {
    global $bdd;
    $sql = 'SELECT * FROM article, auteur WHERE article.id_auteur = auteur.id_auteur AND article.id_categorie = :id_categorie' ;
    $query = $bdd->prepare($sql);
    $query->bindvalue(':id_categorie', $id_categorie);
    $query->execute();

    return $query->fetchAll();
}