<?php

namespace App\Classes;

use App\Interfaces\DBLoader;
use App\Interfaces\WordsBag;

class TextClassifier
{
    protected DBLoader $db;
    protected WordsBag $bags;
    protected string $default_class;

    public function __construct(DBLoader $db, WordsBag $bags, $default_class = 'NaN')
    {
        $this->db = $db;
        $this->bags = $bags;
        $this->default_class = $default_class;
    }

    public function get_count_of_classes(): array
    {
        $db = $this->db;
        $bags = $this->bags;
        $classes = $db->get_classes();
        $counts = array_combine($classes, array_fill(0, count($classes), 0));
        $counts[$this->default_class] = 0;
        foreach ($bags->get_bag() as $word => $count){
            $class = $db->get_class($word);
            if (!empty($class)){
                $class = $class[0];
            }
            else{
                $class = $this->default_class;
            }
            if(isset($counts[$class])){
                $counts[$class] += $count;
            }
        }
        return $counts;
    }

    public function report($deliminator = "\n<br />"): string{
        $output = 'گزارش متن شما:' . $deliminator;
        $counts = $this->get_count_of_classes();
        $i = 1;
        $max = '';
        $max_count = 0;
        foreach ($counts as $class => $count){
            $output .= $i . '- ' . "شما $count کلمه از دسته $class داشتید." . $deliminator;
            if($class !== $this->default_class && $count >= $max_count){
                $max_count = $count;
                $max = $class;
            }
            $i++;
        }

        $output .= 'بنابر اطلاعات ذکر شده متن شما متعلق به دسته ' . $max . ' میباشد.';

        return $output;
    }
}