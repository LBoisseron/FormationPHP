<?php 
    //print_r ($_POST);

    // on initialise les variables à null
    // elles sont null car l'utilisateur n'a pas encore soumis de données
    $email = $sujet = $message = null;
    if(!empty($_POST)) { // si $_POST n'est pas vide
        // récupération des données POST
        $email      = $_POST['email'];
        $sujet      = $_POST['sujet'];
        $message    = $_POST['message'];

        // je déclare un tableau d'erreurs vide
        $errors = [];

        // vérification de l'email
        if(empty($email)) {
            $errors['email'] = "Vous avez oublié votre email.";
        }
        // vérification du format de l'email
        if( !empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // si mon email n'est pas vide et que le format de mon email n'est pas correct,
        //je rentre dans la condition
        $errors['email'] = "Vérifiez le format de votre email.";
        }

        if(empty($sujet)) {
            $errors['sujet'] = "Vous avez oublié votre sujet.";
        }
        if( strlen($message) < 15 ) {
            $errors['message'] = "Le message est trop court. 15 caractères min.";
        }
    // print_r($errors);
        if (empty($errors)) {
        // si mon tableau d'erreurs après toutes les vérifications est vide
        // alors il n'a pas d'erreurs et je peux procéder à la suite de mon traitement
        // sauvegarde en BDD, envoi de mail, etc
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire PHP</title>
</head>
<body>

<!-- EXERCICE
1. Créer un Formulaire de Contact en utilisant Bootstrap avec les champs suivants : email, sujet, message.
-->
<div class="container">

    <div class="jumbotron jumbotron-fluid" class="form-control">
        <div class="container">
            <h1 class="display-4">Formulaire 3</h1>
        </div>
    </div>
<form method="post" action="formulaire3.php">
    <div class="form-group">
        <label for="email"><strong>Email</strong></label>
        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $email ?>" 
        placeholder="Saisissez votre @mail">
    <div class="invalid-feedback">
        <?= isset($errors['email']) ? $errors['email'] : '' ?>
    </div>
    </div>
    <div class="form-group">
        <label for="sujet"><strong>Sujet</strong></label>
        <input type="sujet" class="form-control <?= isset($errors['sujet']) ? 'is-invalid' : '' ?>" id="sujet" name="sujet" value="<?= $sujet ?>" placeholder="Saisissez votre sujet">
    <div class="invalid-feedback">
        <?= isset($errors['sujet']) ? $errors['sujet'] : '' ?>
    </div>
    </div>
    <div class="form-group">
        <label for="textarea"><strong>Saisissez votre message</strong></label>
        <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" id="message" name="message" rows="3" value="<?= $message ?>" placeholder="Saisissez votre Message"></textarea>
        <div class="invalid-feedback">
        <?= isset($errors['message']) ? $errors['message'] : '' ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Envoyer mes informations</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>