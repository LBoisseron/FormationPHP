<?php

session_start(); // lorsque j'effectue une session_start la session n'est pas recréée car elle existe déjà
// il faut OBLIGATOIREMENT déclarer session_start pour accéder à $_SESSION
echo '<pre>';
var_dump($_SESSION);
echo '<pre>';