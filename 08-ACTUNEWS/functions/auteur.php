<?php
/**
 * dans ce fichier nous allons définir quelques fonctions qui seront utiles pour gérer nos auteurs (membres)
 *  - vérifier l'existence d'un membre dans la base
 *  - inscrire un membre
 *  - connecter un membre
 *  - déconnexion
 */

/**
 * va permettre l'inscription d'un auteur / membre dans la BDD
 * retourner TRUE ou 1 (oui) si l'insertion a été faite correctement
 * retourner FALSE ou 0 (non) si erreur
 */
function inscription($prenom, $nom, $email, $motdepasse) {
    global $bdd;
    $query = $bdd->prepare('INSERT INTO auteur (prenom, nom, email, motdepasse) VALUES (:prenom, :nom, :email, :motdepasse)
    ');
    $query->bindvalue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindvalue(':nom', $nom, PDO::PARAM_STR);
    $query->bindvalue(':email', $email, PDO::PARAM_STR);
    $query->bindvalue(':motdepasse', password_hash($motdepasse, PASSWORD_DEFAULT), PDO::PARAM_STR);

    return $query->execute();
}

/**
 * permet la connexion d'un utilisateur
 * le stockage de ses informations en session ! 
 * retourner TRUE ou 1 (oui) si la connexion a été faite correctement
 * retourner FALSE ou 0 (non) si erreur
 */
function connexion($email, $motdepasse) {
    global $bdd;

    $sql = 'SELECT * FROM auteur WHERE email = :email';
    $query = $bdd->prepare($sql);
    $query->bindvalue(':email', $email, PDO::PARAM_STR);
    $query->execute();

    // récupération de l'auteur dans la base
    $auteur = $query->fetch();

    //on vérifie si un auteur a bien été trouvé et que dans le mm tps le motdepasse saisi
    //par l'utilisateur dans le formulaire correspond au motdepasse de l'auteur trouvé dans la BDD
    if($auteur && password_verify($motdepasse, $auteur['motdepasse'])) {
        
        //mettre en session les informations de l'auteur
        $_SESSION['auteur'] = $auteur; //je stocke dans ma session PHP à la clé auteur mon tableau associatif $auteur
        
        return true;
    }
    return false;
}

    
?>