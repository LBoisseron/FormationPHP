<?php

/*
    OBJECTIF : Afficher dans un tableau HTML <table>, <tr>, <td>
    les demandes de contacts reçu depuis le formulaire 02.

    CONSIGNE : 
    1. Récupérer les demandes de contacts depuis la base de données.
    2. Afficher dans un tableau HTML à l'aide d'une boucle les demandes reçus.
    3. BONUS : Ajouter un bouton permettant de supprimer un message.

    -----------------------------------------------------
    |   ID   |  EMAIL  |  SUJET  |  MESSAGE  |  ACTION  |
    -----------------------------------------------------
    |   1    | ..@x.xx | deman...| un mess...|    X     |
    |   2    | ..@x.xx | deman...| un mess...|    X     |
    |   3    | ..@x.xx | deman...| un mess...|    X     |

*/

// -- Inclusion de la configuration de la BDD
require_once 'config/database.php';

//$query = $bdd->query('SELECT * FROM contacts');
//$contacts = $query->fetch();
//print_r($query->fetch());

$query = $bdd->query('SELECT * FROM contacts');
$contactss = $query->fetchAll();

echo '<pre>';
print_r ($contactss);
echo '</pre>';



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire PDO de contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Sujet</th>
      <th scope="col">Message</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($contactss as $contacts) { ?>
    <tr>
      <th scope="row"><?php echo $contacts['id_contact'] ?></th>
      <td><?php echo $contacts['email'] ?></td>
      <td><?php echo $contacts['sujet'] ?></td>
      <td><?php echo $contacts['message'] ?></td>
      <td><a class="btn btn-danger" href="#">Supprimer</td>
    </tr>
    <?php } ?>
    
    
  </tbody>
</table>


</div>
</body>
</html>