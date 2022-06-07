<?php
    require '../vendor/autoload.php';

    $db = new \App\Classes\DBLoader();

    dd($db->load('C:\xampp\htdocs\textFinder-Interview\storage\database.csv'));