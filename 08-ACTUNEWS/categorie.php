<?php
    // récupération du nom de la catégorie dans l'URL
    $nom_categorie = (isset($_GET['nom_categorie'])) ? $_GET['nom_categorie'] : '';
?>

<?php
// inclusion de header.php sur la page
require_once(__DIR__.'/partials/header.php');
?>


<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?php echo $_GET['nom_categorie']; ?></h1>
</div>



<?php
// inclusion de footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>