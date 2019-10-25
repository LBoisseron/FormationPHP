<?php
/**
 * c'est l'inclusion de la connexion à ma BDD
 * -----------------------------------------
 * grâce au require_once, ma variable $bdd est maintenant disponible dans cette page
 * je peux donc utiliser $bdd pour accéder à ma BDD
 */
require_once 'config/database.php';


/*
OBJECTIF : Réaliser, Valider et Insérer les données d'un formulaire.

CONSIGNE :
    1. Créer une BDD 'contact' permettant de stocker les informations d'un formulaire :
        - id
        - email
        - sujet
        - message

    2. Créer un formulaire bootstrap permettant la saisie de ces champs.

    3. A la soumission du formulaire, vérifiez les données :
        - Tous les champs sont obligatoires ;
        - Vérifier le format du champ 'email' ;
        - Le 'message' doit avoir 15 caractères minimum.

    4. Insérer les données vérifiées dans votre BDD.

    BONUS : Afficher un message de confirmation / d'erreur à l'utilisateur grâce à une alerte bootstrap.
    */

/**---------------LES VARIABLES-------------------- */
$email = $sujet = $message = $content = null ;

if(!empty($_POST)) {
    foreach ($_POST as $cle => $valeur) {
    $$cle = $valeur;
    } 

/**-------------LE TABLEAU D'ERREURS-------------------- */
    $erreurs = [];
        if(empty($email)) {
            $erreurs['email']   = "Vous avez oublié de saisir votre email";
        }
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs['email']   = "Vérifiez le format de votre email";
        }
        if(empty($sujet)) {
            $erreurs['sujet']   = "Vous avez oublié de saisir un sujet";
        }
        if(strlen($message) < 15) {
            $erreurs['message'] = "Votre message est trop court";
        }

/**-------------INSERER DES DONNEES-------------------- */
    $query = $bdd->prepare('INSERT INTO `contacts` (`email`, `sujet`, `message`) VALUES (:email, :sujet, :message);');
        $query->bindvalue(':email', $email, PDO::PARAM_STR);
        $query->bindvalue(':sujet', $sujet, PDO::PARAM_STR);
        $query->bindvalue(':message', $message, PDO::PARAM_STR);
        $query->execute();

//var_dump($email);

/**-------------RECUPERER DES DONNEES-------------------- */
$query = $bdd->query('SELECT * FROM contacts');
$contactss = $query->fetchAll();


}

?>

<!-------------MON HTML-------------------->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire PDO contact</title>
</head>

<body>

<div class="container">

<!---------------------------MON JUMBOTRON------------------------------------->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Formulaire de contact</h1>
        </div>
    </div>

<!---------------------------MON FORMULAIRE------------------------------------->

<?= $content ?>

    <form method="post" action="02-FormulairePDO.php">

        <label for="email"><strong>L'e-mail</strong></label>
        <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
            <input type="text" class="form-control <?= isset($erreurs['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $email ?>" placeholder="Saisissez votre @mail">
            <div class="invalid-feedback">
                <?= isset($erreurs['email']) ? $erreurs['email'] : '' ?>
            </div>
        </div>


        <div class="form-group">
            <label for="sujet"><strong>Le sujet</strong></label>
            <input type="text" class="form-control <?= isset($erreurs['sujet']) ? 'is-invalid' : '' ?>" id="sujet" name="sujet" value="<?= $sujet ?>" placeholder="Saisissez votre sujet">
            <div class="invalid-feedback">
                <?= isset($erreurs['sujet']) ? $erreurs['sujet'] : '' ?>
            </div>
        </div>

        <div class="form-group">
            <label for="message"><strong>Le message</strong></label>
            <textarea class="form-control <?= isset($erreurs['message']) ? 'is-invalid' : '' ?>" id="message" name="message" value="<?= $message ?>" rows="6" placeholder="Saisissez votre message"></textarea>
            <div class="invalid-feedback">
                <?= isset($erreurs['message']) ? $erreurs['message'] : '' ?>
            </div>
        </div>

        <button type="submit" class="btn btn-danger btn-block">Envoyer le message</button>
    </form>

</div>

</body>
</html>




