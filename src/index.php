<?php

use App\Classes\CSVLoader;
use App\Classes\TextClassifier;
use App\Classes\WordsBagTXT;

require '../vendor/autoload.php';

$db = new CSVLoader();
$db->load('../storage/databaseFactor.csv');

$wb = new WordsBagTXT();
$wb->load('../storage/article.txt');

$tc = new TextClassifier($db, $wb, 'متفرقه');
echo $tc->report();

