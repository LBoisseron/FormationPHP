<?php
// inclusion du fichier database
require_once(__DIR__.'/../config/database.php');
// inclusion de nos fonctions
require_once(__DIR__.'/../functions/categorie.php');
require_once(__DIR__.'/../functions/article.php');

//$categories = ['ManjéBon', 'KréyolVaybz', 'KeepLeSwag', 'Lyannaj']
// recurération des catégories de la base

$categories = getCategories();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BanMwenFréLa | Lokal lokal</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--STYLES PERSONNALISES-->
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<!--MENU DU SITE-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BanMwenFréLa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href=".">KontanVwèZot <span class="sr-only">(current)</span></a>
                </li>
<!--Les caégories du site-->
                <?php foreach($categories as $categorie) { ?>
                <li class="nav-item active">
                <a class="nav-link" href="categorie.php?nom_categorie=<?= $categorie['nom']; ?>"><?= $categorie['nom']; ?><span class="sr-only">(current)</span></a>
                </li>
                <?php } ?>
                <li class="nav-item active btn-outline-primary mx-2">
                    <a class="nav-link" href="connexion.php">Konèkté'w <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active btn-outline-primary mx-2">
                    <a class="nav-link" href="inscription.php">Enskri'w <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
<!--FIN DU MENU DU SITE-->
    
