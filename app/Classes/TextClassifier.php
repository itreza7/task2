<?php

namespace App\Classes;

use App\Interfaces\DBLoader;
use App\Interfaces\WordsBag;

class TextClassifier
{
    private DBLoader $db;
    private WordsBag $bags;

    public function __construct(DBLoader $db, WordsBag $bags)
    {
        $this->db = $db;
        $this->bags = $bags;
    }

    public function get_count_of_classes(): array
    {
        $db = $this->db;
        $bags = $this->bags;
        $classes = $db->get_classes();
        $counts = array_combine($classes, array_fill(0, count($classes), 0));
        $counts['متفرقه'] = 0;
        foreach ($bags->get_bag() as $word => $count){
            $class = $db->get_class($word);
            if(isset($counts[$class])){
                $counts[$class] += $count;
            }
            else{
                $counts['متفرقه'] += $count;
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
            if($class !== 'متفرقه' && $count >= $max_count){
                $max_count = $count;
                $max = $class;
            }
            $i++;
        }

        $output .= 'بنابر اطلاعات ذکر شده متن شما متعلق به دسته ' . $max . ' میباشد.';

        return $output;
    }
}