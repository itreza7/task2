<?php

namespace App\Classes;

use App\Interfaces\DBLoader;

class CSVLoader implements DBLoader
{

    protected array $db = [];

    public function load(...$args): void
    {
        $db = [];
        $counter = 0;
        if (($handle = fopen($args[0], "r")) !== FALSE) {
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
        $this->db = $db;
    }

    public function exists($string): bool
    {
        return !empty($this->get_class($string));
    }

    public function get_class($string): array
    {
        $db = $this->db;
        $classes = [];
        foreach ($db as $class => $value){
            if (in_array($string, $value)){
                $classes[] = $class;
            }
        }
        return $classes;
    }

    public function get_classes(): array
    {
        return array_keys($this->db);
    }
}