<?php

namespace App\Classes;


use App\Interfaces\DBLoader;

class CSVLoader implements DBLoader
{

    private array $db = [];

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
        return (bool) $this->get_class($string);
    }

    public function get_class($string): ?string
    {
        $db = $this->db;
        foreach ($db as $class => $value){
            if (in_array($string, $value)){
                return $class;
            }
        }
        return null;
    }

    public function get_classes(): array
    {
        return array_keys($this->db);
    }
}