<?php

use biller\csv2array\Csv2Array;
use PHPUnit\Framework\TestCase;

class Csv2ArrayTest extends TestCase
{
    public function testHeaders()
    {
        $file = __DIR__ . '/_data/names.csv';
        $array = Csv2Array::convert($file);
        $this->assertEquals([
            ['name' => 'Peter'],
            ['name' => 'John'],
            ['name' => 'Laura'],
        ], $array);
    }

    public function testNoHeaders()
    {
        $file = __DIR__ . '/_data/numbers.csv';
        $array = Csv2Array::convert($file, false);
        $this->assertEquals([
            ['123', '456'],
            ['456'],
            ['789'],
        ], $array);
    }
}
