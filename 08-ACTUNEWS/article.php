<?php
// inclusion de header.php sur la page
require_once(__DIR__.'/partials/header.php');

// si mon parametre n'existe pas dans la route, j'affecte la valeur 0.
// ainsi ma requête ne retournera aucun résultat.
// $id_article = (isset($_GET['id_article'])) ? $_GET['id_article'] : 0;
// $article = getArticleById('id_article');

// ou plus simplement :
$article = getArticleById($_GET['id_article'] ?? 0);
// var_dump($article);
?>

<!--ICI viendra le contenu de la page-->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?= $article['titre'] ?></h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100" src="assets/img/article/<?= $article['image'] ?>" alt="<?= $article['titre'] ?>">
            </div>
            <div class="col-12 mt-4">
                <?= $article['contenu'] ?>
            </div>
        </div>
    </div>
</div>

<?php
// inclusion de footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>