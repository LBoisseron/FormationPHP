<?php 
    print_r ($_POST);
    if(!empty($_POST)) {
        echo '<br>prenom : ' . $_POST['prenom'] . '<br>';
        echo 'nom : ' . $_POST['nom'] . '<br>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Formulaire 1</h1>
    <!--
        créer un formulaire HTML avec 2 champs : prénom et nom + submit
        NE PAS OUBLIER LA PROPRIETE "name"
        elle nous permettra de récupérer la saisie de l'utilisateur dans $_POST
    -->

    <!--method: permet de préciser quelle méthode POST | GET doit être utilisée par le navigateur
    pour transmettre les données vers la page "action"
    action : cet attribut permet de renseigner le script / la page vers laquelle l'utilisateur sera redirigé
    lors de l'envoi du formulaire. cette page va recevois l'ensemble des données saisies par mon utilisateur-->
    <form method="post" action="formulaire1.php">
        <div>
            <label for="prenom">Prénom</label> <br>
            <input type="text" id="prenom" name="prenom" placeholder="Saisissez votre Prénom"><br><br>
        </div>
        <div>
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" placeholder="Saisissez votre Nom"><br><br>
        </div>
        <button type="submit" class="btn">Envoyer</button>
    </form>
</body>
</html>