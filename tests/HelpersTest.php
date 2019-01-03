<?php
/**
 * Created by PhpStorm.
 * User: Cristian Jaramillo (cristian_gerar@hotmail.com)
 * Date: 02/01/2019
 * Time: 03:00 PM
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 *
 * Class HelpersTest
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 */
final class HelpersTest extends TestCase
{
    /**
     *
     */
    public function testOne() : void
    {
        echo one(2) . "\n";
    }

    /**
     *
     */
    public function testTwo() : void
    {
        echo two(4, 3) . "\n";
    }

    /**
     *
     */
    public function  testThree() : void
    {
        echo three(1) . "\n";
        echo three(3) . "\n";
        echo three(9) . "\n";
        echo three(27) . "\n";
        echo three(81) . "\n";
    }

    /**
     *
     */
    public function testPrintNSubString()
    {
        echo printNSubString("dbac", 3) . "\n";
    }

    /**
     *
     */
    public function testBalancedParentheses() : void
    {
        echo balanced_parentheses(1) . "\n";
        echo balanced_parentheses(2) . "\n";
    }

    /**
     *
     */
    public function testSuperDigit() : void
    {
        echo super_digit(9875) . "\n";
        echo super_digit(148148148) . "\n";
    }

}