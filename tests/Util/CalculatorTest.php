<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08.02.2018
 * Time: 9:24
 */

namespace App\Tests\Util;

use App\Util\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(5, 10);

        $this->assertEquals(15, $result);
    }
}
