<!-- Inclusion du header -->
<?php include_once './includes/header.php' ; ?>

<?php
// aperçu des données $_GET
// si $_GET['page'] n'est pas vide
if ( !empty($_GET['page'])) {
//je crée une variable $page
    $page = $_GET['page'];
} else {
    $page = 'accueil';
}
?>
<!--afficher les données de $page-->
<h3>Je suis la page <?=$page ?></h3>

<!--
    on inclut $page dans notre fichier
    include './pages/accueil.php';
    include './pages/presentation.php';
-->

<?php include './pages/' . $page . '.php' ; ?>

<!-- Inclusion du footer -->
<?php include_once './includes/footer.php' ; ?>  
