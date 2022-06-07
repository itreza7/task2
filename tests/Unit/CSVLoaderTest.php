<?php

namespace Tests\Unit;

use App\Classes\CSVLoader;
use PHPUnit\Framework\TestCase;

class CSVLoaderTest extends TestCase
{

    /** @test */
    public function loading_test(): void{
        $db = new CSVLoader();
        $db->load('../storage/database.csv');
        $this->assertTrue(true);
    }

    /** @test */
    public function get_classes_test(): void{
        $db = new CSVLoader();
        $db->load('../storage/database.csv');
        $classes = $db->get_classes();
        $expected = ['پزشکی', 'ورزشی', 'اقتصادی'];
        $this->assertEquals($expected, $classes);
    }

}
