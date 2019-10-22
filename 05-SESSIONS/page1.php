<?php

session_start(); // permet de démarrer une session PHP
echo '<pre>';
var_dump($_SESSION);
echo '<pre>';

/**
 * $_SESSION est une superglobale comme $_POST ou $_GET
 * on va donc travailler avec un tableau array
 */

$_SESSION['prenom'] = "Léna";
$_SESSION['nom']    = "BOISSERON";
$_SESSION['poste']  = "Chef d'entreprise";

unset($_SESSION['poste']); // supprimer une donnée de la session

/**
 * pour détruire complètement la session, par exemple déconnecter un utilisateur / vider un panier... 
 */

 session_destroy();

 echo '<pre>';
var_dump($_SESSION);
echo '<pre>';