<?php

namespace App\Classes;

use App\Interfaces\WordsBag;

class WordsBagTXT implements WordsBag
{

    protected $text = '';

    public function load(...$args): void
    {
        $path = $args[0];
        $this->text = file_get_contents($path);
    }

    public function str_word_count_utf8($str) {
        return preg_split('~[^\p{L}\p{N}\']+~u',$str);
    }

    public function get_bag(): array
    {
        $string = trim(preg_replace('/\s\s+/', ' ', $this->text));
        $array = $this->str_word_count_utf8($string);
        $result = [];
        foreach ($array as $word){
            if(in_array($word, $result)){
                $result[$word]++;
            }
            else{
                $result[$word] = 1;
            }
        }
        return $result;
    }
}