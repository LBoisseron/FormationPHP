<?php
// Initialiser les variables
$categorie = $radio = $titre = $annonce = $prix = $content = null;
$radio = 'offre';

// si $_POSTn'est pas vide
if(!empty($_POST)) {
    //    $categorie  = $_POST['categorie'];
    //    $radio      = $_POST['radio'];
    //    $titre      = $_POST['titre'];
    //    $annonce    = $_POST['annonce'];
    //    $prix       = $_POST['prix'];
    
    /**
     * au lieu de faire une affectation manuelle, vous pouvez automatiser la création des variables
     * --------------------------------
     * c'est ce qu'on appelle la création dynamique des variables
     */
    foreach ($_POST as $cle => $valeur) {
        $$cle = $valeur;
    }
    //var_dump($categorie);
    //var_dump($radio);
    //var_dump($titre);
    //var_dump($annonce);
    //var_dump($prix);

    // créer un tableau d'erreurs pour la vérification
    $erreurs = [];
    if(empty($categorie)) {
        $erreurs['categorie'] = "Choisissez une catégorie";
    }
    if(empty($radio)) {
        $erreurs['radio']     = "Sélectionnez";
    }
    if(empty($titre)) {
        $erreurs['titre']     = "Vous avez oublié le titre";
    }
    if(strlen($annonce) < 200) {
        $erreurs['annonce']   = "Votre annonce est trop courte";
    }
    if(empty($prix)) {
        $erreurs['prix']      = "Indiquez le prix";
    }
    if(!empty($prix) && !filter_var($prix, FILTER_VALIDATE_FLOAT)) {
        $erreurs['prix']      = "Vérifiez le format de votre prix";
    }

    // vérifiez si il y a des erreurs
    if(empty($erreurs)) {

        $content = '
        <div class="alert alert-success">
        Merci. Votre annonce : <strong>' .$titre . '</strong> a bien été publiée !
        </div>
        ';
        $categorie = $radio = $titre = $annonce = $prix = null;
        $radio = 'offre';   
    } else  {

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
    <title>Déposer une annonce</title>
</head>
<body>

<!-- EXERCICE
1. A l'aide de bootstrap, créez un formulaire, permettant de déposer une annonce. Vous utiliserez les champs suivants :
    -- Un champ select : Choisissez une catégorie
    -- Un champ radio : Type d'annonce : Offres / Demandes
    -- un champ texte : Titre de l'annonce
    -- un champ textarea : Texte de l'annonce
    -- un champ texte : Prix de l'annonce     
2. A la soumission du formulaire, vous vérifierez les données transmises par l'utilisateur.
3. Si elles sont correctes, vous afficherez un récapitulatif sur la page.
-->

<div class="container">
    <div class="jumbotron jumbotron-fluid" class="form-control">
        <div class="container">
            <h1 class="display-4">Déposer une annonce</h1>
        </div>
    </div>

<?= $content ?>

<form method="post" action="formulaire4.php">

<!--champ select-->

<div class="form-group">
    <label for="categorie"><strong>Catégorie</strong></label>
    <select class="form-control <?= isset($erreurs['categorie']) ? 'is-invalid' : '' ?>" name="categorie" id="categorie" >
        <option value="0">--Choisissez une catégorie--</option>
        <option <?= $categorie == 'automobiles' ? 'selected' : '' ?> value="automobiles">Automobiles</option>
        <option <?= $categorie == 'meubles' ? 'selected' : '' ?> value="meubles">Meubles</option>
        <option <?= $categorie == 'maison' ? 'selected' : '' ?> value="maison">Maison/Appartement</option>
        <option <?= $categorie == 'vetements' ? 'selected' : '' ?> value="vetements">Vêtements</option>
        <option <?= $categorie == 'electromenager' ? 'selected' : '' ?> value="electromenager">Electroménager</option>
    </select>
</div>

<!--bouton radio-->

<div class="form-check">
    <input <?= $radio == 'offre' ? 'checked' : '' ?> class="form-check-input" type="radio" name="radio" id="offre" value="offre" >
    <label class="form-check-label" for="offres">OFFRES</label>
</div>
<div class="form-check">
    <input <?= $radio == 'demande' ? 'checked' : '' ?> class="form-check-input" type="radio" name="radio" id="demande" value="demande" >
    <label class="form-check-label" for="demande">DEMANDES</label>
</div>
<br>

<!--titre annonce-->

<div class="form-group">
    <label for="sujet"><strong>Titre de l'annonce</strong></label>
    <input type="text" class="form-control <?= isset($erreurs['titre']) ? 'is-invalid' : '' ?>" id="titre" name="titre" value="<?= $titre ?>" placeholder="Saisissez votre sujet">
    <div class="invalid-feedback">
        <?= isset($erreurs['titre']) ? $erreurs['titre'] : '' ?>
    </div>
</div>

<!--texte annonce-->

<div class="form-group">
    <label for="textarea"><strong>Votre annonce</strong></label>
    <textarea class="form-control <?= isset($erreurs['annonce']) ? 'is-invalid' : '' ?>" id="annonce" name="annonce" rows="3" value="<?= $annonce ?>" placeholder="Saisissez votre Annonce"></textarea>
    <div class="invalid-feedback">
        <?= isset($erreurs['annonce']) ? $erreurs['annonce'] : '' ?>
    </div>
</div>

<!--prix-->

<label for="prix"><strong>Prix</strong></label>
    <div class="input-group mb-3">
        <input type="text" class="form-control <?= isset($erreurs['prix']) ? 'is-invalid' : '' ?>" id="prix" name="prix" value="<?= $prix ?>" placeholder="Prix">
        <div class="input-group-append">
            <span class="input-group-text">&euro;</span>
        </div>
        <div class="invalid-feedback">
            <?= isset($erreurs['prix']) ? $erreurs['prix'] : '' ?>
        </div>
    </div>

<button type="submit" class="btn btn-primary btn-block">Publier une annonce</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>