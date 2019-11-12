<?php 
/* 
1. Créer une base de donnée : actunews
2. Créer les tables suivantes :
- categorie - (id), nom
- auteur -> (id), prenom, nom, email, password
- article (id), titre, contenu, image, date_creation,
    categorie_id (lien avec la table categorie),
    auteur_id (lien avec la table auteur).
*/

// mise en place de la connexion avec la BDD
// pour connecter PHP et MySQL on utilisera une librairie : PDO
// PDO permettra d'effectuer des opérations CRUD sur ma base

$bdd = new PDO('mysql:localhost;dbname=actunews', 'root', '');

var_dump($bdd);

/**
 * le try / catch permet en cas d'erreur de l'attraper pour effectuer une action paticulière :
 * - afficher un message d'erreur
 * - envoyer un email à l'utilisateur
 * - effectuer une redirection... 
 * ----------------------------------
 * cela nous permet aussi de nous assurer des erreurs retournées
 */


try {
    $bdd = new PDO('mysql:localhost;dbname=actunews', 'root', '');
// en environnement de développement on active les erreurs SQL
// PDO::ERRMODE_SILENT : n'affiche pas les erreurs SQL
// PDO::ERRMODE_WARNING : affiche l'erreur sans couper le script
// PDO::ERRMODE_EXCEPTION : affiche l'erreur et stoppe le script
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Comment je souhaite que PDO me retourne les informations
// https://www.php.net/manual/fr/pdostatement.fetch.php
// PDO::FETCH_ASSOC : Tableau Associatif
// PDO::FETCH_NUM : Tableau Indexé
// PDO::FETCH_OBJ : Un Objet Anonyme
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}   catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Dans la vrai vie, pour mes projets, j'aurais au final le code suivant :

try {
    $bdd = new PDO('mysql:host=localhost;dbname=actunews', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

//var_dump($bdd);

#-----------INSERER DES DONNEES------------------#

//$bdd->exec('
//INSERT INTO `auteur` (`prenom`, `nom`, `email`, `motdepasse`)
//VALUES ("Gérard", "SELBONNE", "gselbonne@yahoo.fr", "actunews2");
//');

//$query = $bdd->prepare('
//INSERT INTO `auteur` (`prenom`, `nom`, `email`, `motdepasse`)
//VALUES (:prenom, :nom, :email, :motdepasse);
//');

/**
 * bindvalue va me permettre d'associer une valeur à chaque paramètre
 * PDO::PARAM_STR : représente une valeur VARCHAR ou string en SQL
 * Cela me permet m'assurer du type de données insérées dans ma base
 * il existe d'autres types :
 *  - PDO::PARAM_BOOL;
 *  - PDO::PARAM_NULL;
 *  - PDO::PARAM_INT
 */

 //$query->bindvalue(':prenom', 'Khélian', PDO::PARAM_STR);
 //$query->bindvalue(':nom', 'SELBONNE', PDO::PARAM_STR);
 //$query->bindvalue(':email', 'khelian@gmail.com', PDO::PARAM_STR);
 //$query->bindvalue(':motdepasse', 'actunews3', PDO::PARAM_STR);

 //if($query->execute()) {
     // traitement en cas de succès
     // envoi d'un email... 
     // envoi d'une notification... 
 //};
 
 $idAuteur = $bdd->lastInsertId();
 var_dump($idAuteur);

/*
    EXERCICE :
        A. Avec l'aide d'une requête préparée, insérer la catégorie "Sciences"


        B. Avec l'aide d'une requête préparée, insérer un article dans la catégorie Politique de l'auteur de votre choix.
*/

//$bdd->exec('INSERT INTO `categorie` (`nom`) VALUES ("Sciences");');

// -- A. Avec l'aide d'une requête préparée, insérer la catégorie "Sciences"
//$query = $bdd->prepare('INSERT INTO `categorie` (`nom`) VALUES (:nom);');
//$query->bindvalue(':nom', 'Multimedia', PDO::PARAM_STR);
//$query->execute();

// -- B. Avec l'aide d'une requête préparée, insérer un article dans la catégorie Politique de l'auteur de votre choix.
//$query = $bdd->prepare('INSERT INTO `article` (`titre`, `contenu`, `image`, `id_categorie`, `id_auteur`) VALUES (:titre, :contenu, :image, :id_categorie, :id_auteur);');
//$query->bindvalue(':titre', '<h1>Ceci est un titre</h1>', PDO::PARAM_STR);
//$query->bindvalue(':contenu', '<p>Ceci est un texte</p>', PDO::PARAM_STR);
//$query->bindvalue(':image', 'ceci-est-un-titre.jpeg', PDO::PARAM_STR);
//$query->bindvalue(':id_categorie', 1, PDO::PARAM_INT);
//$query->bindvalue(':id_auteur', 3, PDO::PARAM_INT);
//$query->execute();


#-----------------------------RECUPERER DES DONNEES------------------------------#

$query = $bdd->query('SELECT * FROM auteur');
var_dump($query);
var_dump($query->rowCount());

// pour récupérer un auteur
$auteur = $query->fetch();
//$auteur = $query->fetch(PDO::FETCH_NUM);
//$auteur = $query->fetch(PDO::FETCH_BOTH);
//$auteur = $query->fetch(PDO::FETCH_OBJ);

echo '<pre>';
print_r($auteur);
print_r($query->fetch()); // récupérer le résultat suivant dans la BDD
print_r($query->fetch()); // ainsi de suite
echo '</pre>';

// pour plus de simplicité, utilisons une boucle
echo '<hr>';
$query = $bdd->query('SELECT * FROM categorie');
$categories = $query->fetchAll();

/**
 * j'obtiens ici, un tableau indexé en 2D, avec pour chaque index un tableau associatif de catégories
 */
echo '<pre>';
print_r($categories);
print_r($categories[2]['nom']);
echo '<pre>';

/*
    EXERCICE I : Parcourir tous les articles du fetchAll avec une boucle
    foreach(). Vous afficherez le titre de chaque article dans un <h3>.

    EXERCICE II : Parcourir tous les articles du fetch() avec une boucle
    while(). Vous afficherez le titre de chaque article dans un <h3>.
*/

$query = $bdd->query('SELECT * FROM article');
$articles = $query->fetchAll();
foreach ($articles as $article) {
    echo '<h3>' . $article['titre'] . '</h3>';
}

$query = $bdd->query('SELECT * FROM article');
while ($article = $query->fetch()) {
    echo '<h3>' . $article['titre'] . '</h3>';
}

/**
 * avec la boucle FETCH, il n'y a pas un tableau avec tous les enregistrements, 
 * mais un tableau par enregistrment, soit un tableau associatif par article
 * ---------------------------------------------------
 * avec la boucle FOREACH, j'aurai un tableau qui contiendra tous mes enregistrements
 * -----------------------------------------------------
 * MEMO :
 * - votre requête retourne plusieurs résultats : une BOUCLE
 * - votre requête ne doit sortir qu'un unique résultat : PAS DE BOUCLE
 * - votre requête ne sort qu'un résultat, mais peut potentiellement en sortir plusieurs : UNE BOUCLE
 */

 /*
    On peux s'appuyer sur les données transmises dans l'URL ($_GET)
    pour récupérer des informations dans la base de données.
*/

// print_r( $_GET['id'] );
$idArticle = isset($_GET['id']) ? $_GET['id'] : 0;

$query = $bdd->prepare('
    SELECT * FROM article
        WHERE id = :id
'); // :id est un paramètre.

$query->bindValue(':id', $idArticle, PDO::PARAM_INT); // On s'assure que l'ID est bien un entier.

$query->execute(); // J'execute ma requète
$article = $query->fetch(); // Je récupère le résultat

echo '<hr>';
echo '<pre>';
    print_r($article);
    print_r($article['titre']);
echo '</pre>';