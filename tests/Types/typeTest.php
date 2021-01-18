<?php
require "src/Helper/Types/type.php";
use Helper\Types\TypeUtils;
use PHPUnit\Framework\TestCase;

final class typeTest extends TestCase
{
    public function testGetBool()
    {
        $elements = [
            'true(boolean)' => [true, true],
            'false(boolean)' => [false, false],
            '1' => [1, true],
            '0' => [0, false],
            'true(string)' => ['true', true],
            'false(string)' => ['false', false],
        ];

        foreach($elements as $type => $row){
            $data = $row[0];
            $expect = $row[1];
            $this->assertSame($expect, TypeUtils::getBool($data), $type . ' failed');
        }
        
    }

}