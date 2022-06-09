<?php

namespace App\Classes;


class TextClassifierWithFactor extends TextClassifier
{

    public function get_count_of_classes(): array
    {
        $db = $this->db;
        $bags = $this->bags;
        $classes = $db->get_classes();
        $counts = array_combine($classes, array_fill(0, count($classes), [
            'count' => 0,
            'factor' => 0
        ]));
        $counts[$this->default_class] = [
            'count' => 0,
            'factor' => 0
        ];
        foreach ($bags->get_bag() as $word => $count){
            $class_list = $db->get_class($word);
            if (!empty($class_list)){
                foreach ($class_list as $class => $factor){
                    $counts[$class] = [
                        'count' => $counts[$class]['count'] + $count,
                        'factor' => $counts[$class]['factor'] + $factor
                    ];
                }
            }
            else{
                $counts[$this->default_class] = [
                    'count' => $counts[$this->default_class]['count'] + $count,
                    'factor' => $counts[$this->default_class]['factor'] + 1
                ];
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
        foreach ($counts as $class => $res){
            $output .= sprintf('شما %d کلمه از دسته %s با مجموع وزن %d داشته اید' . $deliminator, $res['count'], $class, $res['factor']);
            $count = $res['count'] * $res['factor'];
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