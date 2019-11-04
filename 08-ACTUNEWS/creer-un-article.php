<?php
/**
 * OJECTIF : mettre en place la page permettant l'ajout d'un article dans la BDD
 * 
 * CONSIGNE
 * 1. mettre en place le formulaire HTML
 *      id
 *      titre
 *      contenu
 *      image
 *      date_creation
 *      
 * 2. valider le formulaire à l'aide de PHP
 * 3. insérer l'article en BDD sans tenir compte de l'image
 * 4. BONUS : gérer l'upload de l'image
 * 5. BONUS : après l'insertion, rediriger l'utilisateur sur l'article nouvellement créé
 * 
 */

//____________________________________________________________________________________________________


// inclusion de header.php sur la page
require_once(__DIR__.'/partials/header.php');

$id_auteur = $auteur = $titrearticle = $contenuarticle = null;



if ($auteur) {
    $auteurId = $auteur['id_auteur'];
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Soumettre un article</title>
</head>
<body>
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Soumettre un article</h1>
                <p class="lead"></p>
            </div>
        </div>
        <form method="POST" action="/creer-un-article.php" class="form-horizontal">

<!-------------IDENTIFIANT-------------->
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Identifiant</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="id_auteur" name="id_auteur" value="<?= $id_auteur ?>">
                </div>
            </div>

<!-------------TITRE ARTICLE-------------->
            <div class="form-group">
                <label for="formGroupExampleInput">Titre de l'article</label>
                <input type="text" class="form-control" id="titrearticle" name="titrearticle" value="<?= $titrearticle ?>" placeholder="Titre de l'article">
            </div>

<!-----------------CATEGORIES-------------------->
            <div class="form-group">
                <label for="formGroupExampleInput">Catégorie de l'article</label>
                <select id="categoriearticle" name="id_categorie" class="form-control" class="form-horizontal">
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                    <?php } ?>
                </select>   
            </div>

<!-------------CONTENU ARTICLE-------------->
            <div class="form-group">
                <label for="contenuarticle">Le contenu</label>
                <textarea class="form-control" id="contenuarticle" name="contenuarticle" value="<?= $contenuarticle ?>" rows="5" placeholder="Saisissez votre contenu"></textarea>
                <script>CKEDITOR.replace( 'contenuarticle' );</script>
            </div>
            
<!-------------AJOUTER IMAGE-------------->
            <div class="form-group">
                <label for="file">Ajouter une image</label><br>
            <input type="file" name="image" multiple><br><br>
            </div>

<!-------------DATE CREATION-------------->


<!-------------BOUTON D'ENVOI-------------->
            <button type="submit" class="btn btn-primary btn-block">I alé !</button>
        </form>
    </div>
</body>
</html>

<?php
// inclusion de footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>