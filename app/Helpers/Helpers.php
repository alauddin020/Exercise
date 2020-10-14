<?php


namespace App\Helpers;


use Carbon\Carbon;

class Helpers
{
    public static function slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public static function slug_remove($string)
    {
        return str_replace('-', ' ', trim($string));
    }
    public static function date($date)
    {
        return Carbon::parse($date)->format('d F,Y');
    }

    public static function ago($time)
    {
        return $time->diffForHumans();
    }

    public static function implode($types){
        return implode(",", $types);

    }

    public static function explode($types){
        return explode(",", $types);

    }

    public static function random(){

        return rand(1111, 9999);
    }

    public static function first_letter_capital_string($string)
    {
        return ucwords($string);
    }

    public static function number($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }

    public static function text($string)
    {
        return preg_replace('/[0-9]+/', '', $string);
    }
    public static function letter($string)
    {
        return ucfirst($string);
    }
    public static function remove($text) {
        $t = $text;
        $specChars = array(
            ' ' => '-',    '!' => '',    '"' => '',
            '#' => '',    '$' => '',    '%' => '',
            '&amp;' => '',    '\'' => '',   '(' => '',
            ')' => '',    '*' => '',    '+' => '',
            ',' => '',    '₹' => '',    '.' => '',
            '/-' => '',    ':' => '',    ';' => '',
            '<' => '',    '=' => '',    '>' => '',
            '?' => '',    '@' => '',    '[' => '',
            ']' => '',    '^' => '',    '√' => '',
            '_' => '',    '`' => '',    '{' => '',
            '|' => '',    '}' => '',    '~' => '',
            '-----' => '-',    '----' => '-',    '---' => '-',
            '/' => '',    '--' => '-',   '/_' => '-',

        );

        foreach ($specChars as $k => $v) {
            $t = str_replace($k, $v, $t);
        }
        return self::slug_remove($t);
    }
}
