<?php

use App\Classes\CSVLoaderWithFactor;
use App\Classes\TextClassifierWithFactor;
use App\Classes\WordsBagTXT;

require '../vendor/autoload.php';

$db = new CSVLoaderWithFactor();
$db->load('../storage/databaseFactor.csv');

$wb = new WordsBagTXT();
$wb->load('../storage/article2.txt');

$tc = new TextClassifierWithFactor($db, $wb, 'متفرقه');
echo $tc->report();

