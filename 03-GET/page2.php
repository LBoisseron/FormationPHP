<h1>Page 2</h1>

<?php
/*
on peut accéder aux données de l'url grâce à $_GET.
$_GET est une super globale et s'écrit toujours en majuscules.
si il n'y a aucune info dans l'url alors $_GET est 'empty' 
*/

echo '<pre>';
    print_r($_GET);
echo '</pre>';

// afficher les infos de $_GET
// si $_GET n'est pas <vide
if( !empty( $_GET )) {
// je peux lire son contenu grâce à $_GET['cle']
    echo 'ID : ' . $_GET['id'] . '<br>';
    echo 'Titre : ' . $_GET['titre'] . '<br>';
    echo 'Date : ' . $_GET['date'] . '<br>';
}

?>