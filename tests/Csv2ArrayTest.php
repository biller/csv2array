<?php

use biller\csv2array\Csv2Array;
use Codeception\Test\Unit;

class Csv2ArrayTest extends Unit
{
    public function testHeaders()
    {
        $file = codecept_data_dir('names.csv');
        $array = Csv2Array::convert($file);
        $this->assertEquals([
            ['name' => 'Peter'],
            ['name' => 'John'],
            ['name' => 'Laura'],
        ], $array);
    }

    public function testNoHeaders()
    {
        $file = codecept_data_dir('numbers.csv');
        $array = Csv2Array::convert($file, false);
        $this->assertEquals([
            ['123', '456'],
            ['456'],
            ['789'],
        ], $array);
    }
}