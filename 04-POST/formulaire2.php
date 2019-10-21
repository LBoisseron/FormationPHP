<?php 
    print_r ($_POST);
    if(!empty($_POST)) {
        echo '<br><br>prenom : ' . $_POST['prenom'] . '<br>';
        echo 'nom : ' . $_POST['nom'] . '<br>';
        echo 'email : ' . $_POST['email'] . '<br>';
        echo 'password : ' . $_POST['password'] . '<br>';
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire 2</title>
</head>
<body>
<h1>Formulaire 2</h1>
<!-- EXERCICE
1. Créer un formulaire d'inscription avec les champs suivants : prenom, nom, email et motdepasse
2. Afficher à l'aide de $_POST les informations sur la page.
-->
<br>
<form method="post" action="formulaire2.php">
        <div>
            <label for="prenom">Prénom</label> <br>
            <input type="text" id="prenom" name="prenom" placeholder="Saisissez votre Prénom"><br><br>
        </div>
        <div>
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" placeholder="Saisissez votre Nom"><br><br>
        </div>
        <div>
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email" placeholder="Saisissez votre Email"><br><br>
        </div>
        <div>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password" placeholder="Saisissez votre mot de passe"><br><br>
        </div>
        <button type="submit" class="btn2">Envoyer</button>
    </form>

</body>
</html>