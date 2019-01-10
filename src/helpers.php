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

/**
 *
 */
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
            return 2 * one($n + 1);
    }

}

/**
 *
 */
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
/**
 *
 */
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

/**
 * Imprime todas las combinaciones posibles de paréntesis balanceados, la función recibirá un
 * número entero de la cantidad de paréntesis balanceados requeridos.
 *
 * Por ejemplo:
 *
 * balanced_parentheses(1) ---> {}
 * balanced_parentheses(2) ---> {}{}, {{}}
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
                $start_balanced .= START_PARENTHESES . END_PARENTHESES;
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

if(!function_exists('printNSubString'))
{
    /**
     * Data una cadena, Ordena todas las posibles sub cadenas en orden alfabético e
     * imprime el carácter dado después de concatenar las sub cadenas. Ejemplo:
     *
     * printNSubString("dbac", 3); -> El carácter es C
     *
     * Explicación:
     *
     * Las sub cadenas son > a, ac, b, ba, bac, c, d, db, dba, dbac
     * Después de concatenar es > aacbbabaccddbdbadbac, Por lo tanto quien está en
     * posición 3 es C.
     *
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

        $combinations = [];

        $lettersSplitAux = $lettersSplit;

        for ($i = 0; $i < count($lettersSplit); $i++){

            $letter = $lettersSplit[$i];

            $lettersSplitAux = array_merge(array_diff($lettersSplitAux, [$letter]));

            array_push($combinations, $letter);

            $combinations = array_merge($combinations, printSubString($letter, $lettersSplitAux));
        }

        sort($combinations);

        return substr(implode('', $combinations), $index - 1, 1);
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
 * Check if the function 'super_digit' exists
 */
if(!function_exists('super_digit'))
{
    /**
     * Dado un número, necesitamos encontrar el súper dígito de ese número.
     * Definimos súper dígito de un número como:
     *
     * - Si tiene sólo un dígito entonces el mismo es su súper dígito.
     * - Si tiene más de un dpigito entonces el súper digito es la suma de todos los
     *   dígitos hasta que sólo quede 1 dígito ejemplo:
     *
     * super_digit(9875) = super_digit(9 + 8 + 7 + 5)
     *                   = super_digit(29)
     *                   = super_digit(2 + 9)
     *                   = super_digit(11)
     *                   = super_digit(1 + 1)
     *                   = super_digit(2)
     *                   = 2
     * Para este problema recibes 2 números, y debes calcular el súper dígito de el
     * número resultante en la concatenación de n veces pro ejemplo:
     *
     * 148 | 3
     *
     * Entonces el número del que queremos saber el súper dígito es 148148148:
     *
     * Respuesta -> 3
     *
     * Explicación:
     *
     * super_digit(148, 3) = super_digit(148148148)
     *                     = super_digit(1 + 4 + 8 + 1 + 4 + 8 + 1 + 4 + 8)
     *                     = super_digit(39)
     *                     = super_digit(3 + 9)
     *                     = super_digit(12)
     *                     = super_digit(1 + 2)
     *                     = 3
     *
     */

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

/**
|
| Has una clase llamada Persona que siga las siguientes condiciones:
|  - Sus atributos son: nombre, edad, NSS (Numero de Seguro Social), sexo (H hombre, M mujer), peso y
|    altura. No queremos que se accedan directamente a ellos. Piensa que modificador de acceso es el más
|    adecuado, también su tipo. Si quieres añadir algún atributo puedes hacerlo.
|  - Por defecto, todos los atributos menos el NSS serán valores por defecto según su tipo (0 números, cadena
|    vacía para String, etc.). Sexo será hombre por defecto, usa una constante para ello.
|  - Se definiran varios constructores:
|    > Un constructor por defecto.
|    > Un constructor con el nombre, edad y sexo, el resto por defecto.
|    > Un constructor con todos los atributos como parámetro.
|  - Los métodos que se implementaran son:
|    > calcularIMC(): calculara si la persona está en su peso ideal (peso en kg/(Estatura^2 en m)), devuelve
|      un -1 si está por debajo de su peso ideal, un 0 si está en su peso ideal y un 1 si tiene sobrepeso .Te
|      recomiendo que uses constantes para devolver estos valores.
|
|
|
*/

/**
 * @param int $O
 * @param int $N
 * @param int $M
 */
function complexityAndTime(int $O, int $N, int $M) : void
{
    $a = $b = $O;
    for($i = $O; $i < $N; $i++)
        $a = $a + 5;

    for($j = $O; $j < $M; $j++)
        $b = $b + 5;
}


/*
 * Complete the 'cutSticks' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY lengths as parameter.
 */
