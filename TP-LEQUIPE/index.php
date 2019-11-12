<?php
require_once(__DIR__.'/partials/header.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vyé mès é vyé labitid | L'équipe</title>

<!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--STYLE CSS-->
    <link rel="stylesheet" href="assets/css/style.css">

<!--GOOGLE FONT-->
    <link href="https://fonts.googleapis.com/css?family=Schoolbell&display=swap" rel="stylesheet"> <!--CSS : font-family: 'Schoolbell', cursive;-->
    <link href="https://fonts.googleapis.com/css?family=Sue+Ellen+Francisco&display=swap" rel="stylesheet"> <!--CSS : font-family: 'Sue Ellen Francisco', cursive;-->
</head>


<body>

<!--LE PROJECTEUR-->
  <div class="row" class="imgprojecteur">
    <img src="assets/img/slider/job2019.jpg" alt="JOB2019" id="imgprojecteur">
  </div>
    

<!--LE CONTENU-->
<div class="container">

    <!---->
  <div class="row">

      <!--LA PHOTO-->
    <div class="col">
    <div class="card" >
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
    </div>

    <!--L'ARTICLE-->
    <div class="col">
    <div class="card" >
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
    </div>
  </div>

    <!--LES PARTENAIRES-->
<div class="row">

  <div class="container">

    <div class="row" id="partenaires">
      <div class="col">
        <img src="assets/img/logos/damoiseau.png" style="max-width: 10em;">
      </div>

      <div class="col">
        <img src="assets/img/logos/damoiseau.png" style="max-width: 10em;">
      </div>

      <div class="col">
        <img src="assets/img/logos/damoiseau.png" style="max-width: 10em;">
      </div>

      <div class="col">
        <img src="assets/img/logos/damoiseau.png" style="max-width: 10em;">
      </div>
    </div>

  </div>

</div>



</div>

<?php
require_once(__DIR__.'/partials/footer.php');
?>