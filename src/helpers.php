<?php

/**
 * Created by PhpStorm.
 * User: Cristian Jaramillo (cristian_gerar@hotmail.com)
 * Date: 28/12/2018
 * Time: 03:40 PM
 */

const START_PARENTHESES = '{';

const END_PARENTHESES = '}';

const PATTERN_LETTERS_ONLY = "/^[a-zA-Z]+$/";

if(!function_exists('one'))
{
    /**
     * @param int $n
     * @return int
     */
    function one(int $n) : int
    {
        if($n == 4)
            return $n;
        else
            return $n * one($n + 1);
    }

}

if(!function_exists('two'))
{
    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    function two(int $x, int $y) : int
    {
        if($x == 0)
            return $y;
        else
            return two($x - 1, $x + $y);
    }
}

if(!function_exists('three'))
{
    /**
     * @param int $n
     * @return int
     */
    function three(int $n) : int
    {
        if($n == 0 || $n == 1)
            return $n;

        if($n%3 != 0)
            return 0;

        return three($n / 3);
    }
}

if(!function_exists('printNSubString'))
{
    /**
     * @param string $letters
     * @param int $index
     * @return string
     */
    function printNSubString(string $letters, int $index) : string
    {

        if (!preg_match(PATTERN_LETTERS_ONLY, $letters))
            return null;

        $letters = strtolower($letters);
        $lettersSplit = str_split($letters);

        sort($lettersSplit);

        $combinations = [];

        $lettersSplitAux = $lettersSplit;

        for ($i = 0; $i < count($lettersSplit); $i++){

            $letter = $lettersSplit[$i];

            $lettersSplitAux = array_merge(array_diff($lettersSplitAux, [$letter]));

            array_push($combinations, $letter);

            $combinations = array_merge($combinations, printSubString($letter, $lettersSplitAux));
        }


        return substr(implode('', $combinations), $index, 1);
    }

}

if(!function_exists('printSubString'))
{
    /**
     * @param string $letter
     * @param array $letters
     * @return array
     */
    function printSubString(string $letter, array $letters) : array
    {
        $combinations = array();
        $lettersAux = $letters;

        for ($i = 0; $i < count($letters); $i++)
        {
            $currentLetter = $letters[$i];

            $currentCombination = $letter . $currentLetter;

            array_push($combinations, $currentCombination);

            $lettersAux = array_merge(array_diff($lettersAux, [$currentLetter]));

            $combinations = array_merge($combinations, printSubString($currentCombination, $lettersAux));
        }

        return $combinations;
    }
}

/**
 *
 */
if(!function_exists('balanced_parentheses'))
{
    /**
     * @param int $n
     * @return string
     */
    function balanced_parentheses(int $n) : string
    {
        $start_balanced = '';
        $end_balanced = '';

        $start = '';
        $end = '';

        if($n > 0)
        {
            for ($i = 0; $i < $n; $i++)
            {
                $start_balanced .= (START_PARENTHESES . END_PARENTHESES);
                if($i >= 1)
                {
                    $start .= START_PARENTHESES;
                    $end .= END_PARENTHESES;
                }
            }
            $end_balanced .= $start . $end;
        }

        return $start_balanced . (empty($end_balanced) ? '' : (' , ' . $end_balanced));
    }
}

/**
 * Check if the function 'super_digit' exists
 */
if(!function_exists('super_digit'))
{
    /**
     * @param int $number
     * @return int
     */
    function super_digit(int $number) : int
    {
        if($number < 10)
            return $number;

        $stringNumber = strval($number);

        $newNumber = 0;

        foreach (str_split($stringNumber) as $digit)
        {
            $newNumber += (int) $digit;
        }

        return $newNumber < 10 ? $newNumber : super_digit($newNumber);
    }
}