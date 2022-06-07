<?php

namespace App\Interfaces;

interface DBLoader
{

    public function load($path);

    public function exists($string);

    public function get_class($string);

}