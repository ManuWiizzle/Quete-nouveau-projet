<?php

namespace App\Service;


class Slugify
{
    public function generate(string $input): string
    {
        $input = str_replace(' ', '-', $input);
        $input = trim("$input");
        $input = preg_replace('/([-])\\1+/', '$1', $input);
        $input = mb_strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $input));
        $input = preg_replace('/[^a-zA-Z0-9\-\s]/', '', $input);

        return $input;
    }
}