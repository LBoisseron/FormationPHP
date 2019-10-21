<?php

include_once 'a.php';
include 'a.php';
include 'a.php';
include_once 'a.php'; // ne s'affichera pas
# include 'c.php'; //

require 'b.php';
require_once 'b.php'; // ne s'affichera pas
require_once 'b.php'; // ne s'affichera pas

// require_once 'c.php'; // fatal error: require_once
echo 'RESTE DU SITE...';

/*
include : génère un warning, le script continue normalement
require : génère une fatal error, le script s'arrête
*/