<?php

namespace App\Classes;


class DBLoader implements \App\Interfaces\DBLoader
{

    public function load($path)
    {
        $db = [];
        $counter = 0;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($line = fgetcsv($handle)) !== FALSE) {
                if ($counter == 0){
                    $counter++;
                    continue;
                }
                if ( !isset($db[$line[2]] )){
                    $db[$line[2]] = [];
                }
                $db[$line[2]][] = $line[1];
            }
            fclose($handle);
        }
        return $db;
    }

    public function exists($string)
    {
        // TODO: Implement exists() method.
    }

    public function get_class($string)
    {
        // TODO: Implement get_class() method.
    }
}