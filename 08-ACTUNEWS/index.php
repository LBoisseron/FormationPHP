<?php
// inclusion de header.php sur la page
require_once(__DIR__.'/partials/header.php');


// récupération des articles de la base
$articles = getArticles();
?>

<!--ICI viendra le contenu de la page-->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">BanMwenFréLa</h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $article) { ?>
            <div class="col-md-4 mt-4">
                <div class="card shadow-sm">
                    <img src="assets/img/article/<?= $article['image'] ?>" class="card-img-top" alt="<?= $article['titre'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['titre'] ?></h5>
                        <p class="card-text"><?= summarize($article['contenu']) ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                        <a href="article.php?id_article=<?= $article['id_article'] ?>" class="btn btn-primary">Gadé vwè...</a>
                        <small class="text-muted"><?= $article['prenom'] . ' '. $article['nom'] ?></small>
                        </div>
                       
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php
// inclusion de footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>