<?php

use App\Classes\CSVLoader;
use App\Classes\TextClassifier;
use App\Classes\WordsBagTXT;

require '../vendor/autoload.php';

$db = new CSVLoader();
$db->load('C:\xampp\htdocs\textFinder-Interview\storage\database.csv');

$wb = new WordsBagTXT();
$wb->load('C:\xampp\htdocs\textFinder-Interview\storage\article.txt');

$tc = new TextClassifier($db, $wb);
echo $tc->report();

