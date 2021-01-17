<?php

use Helper\Types\TypeUtils;
use PHPUnit\Framework\TestCase;
require "src/Helper/Types/type.php";

final class typeTest extends TestCase
{
    /**
     * @dataProvider booleanProvider
     */
    public function testAdd($data, bool $expected)
    {
        $this->assertSame($expected, TypeUtils::getBool($data));
    }

    public function booleanProvider()
    {
        return [
          'true(boolean)' => [true, true],
          'false(boolean)' => [false, false],
          '1' => [1, true],
          '0' => [0, false],
          '\'true\'' => ['true', true],
          '\'false\'' => ['false', false],
        ];
    }
}