<?php
// inclusion de header.php sur la page
require_once(__DIR__.'/partials/header.php');

$email = $motdepasse = null;

if(!empty($_POST)) {
    foreach ($_POST as $cle => $valeur) {
    $$cle = $valeur;
    } 

    $erreurs = [];

    if(empty($email)) {
        $erreurs['email'] = 'Vous avez oublié votre email';
    }
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = 'Vérifiez le format de votre email';
    }
    if(empty($motdepasse)) {
        $erreurs['motdepasse'] = 'Vous avez oublié votre mot de passe';
    }
    if(empty($erreurs)) {

    }
}

?>


<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Konèkté'w</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" class="form-horizontal">              
            <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" class="form-control <?= isset($erreurs['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $email ?>" aria-describedby="emailHelp" placeholder="anonyme@exemple.com">
                    <div class="invalid-feedback">
                        <?= isset($erreurs['email']) ? $erreurs['email'] : '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" class="form-control <?= isset($erreurs['motdepasse']) ? 'is-invalid' : '' ?>" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe">
                    <div class="invalid-feedback">
                        <?= isset($erreurs['motdepasse']) ? $erreurs['motdepasse'] : '' ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Konèkté !</button>
            </form>
        </div>
    </div>
</div>

<?php
// inclusion de footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>