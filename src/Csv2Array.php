<?php

namespace biller\csv2array;

use League\Csv\Reader;

class Csv2Array
{
    public static function convert(string $file, bool $headers = true)
    {
        $csv = Reader::createFromPath($file);
        if ($headers) {
            $csv->setHeaderOffset(0);
        }

        if ($headers) {
            $headers = array_map('trim', $csv->getHeader());
        } else {
            $headers = [];
        }

        $return = [];
        foreach ($csv->getRecords($headers) as $e) {
            $return[] = array_map('trim', $e);
        }

        return $return;
    }
}