<?php
require "src/Helper/data.php";

use Helper\Data;
use PHPUnit\Framework\TestCase;

final class dataTest extends TestCase
{
  private $array = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];

  public function testPaginateData()
  {
    $this->testPaginateDataEmpty();
    $this->testPaginateDataNormal();
    $this->testPaginateDataSpecialParam();
  }

  public function testPaginateDataEmpty()
  {
    $elements = [
      'empty string' => [
        'expect' => [],
        'data' => ['', 100, 0],
      ],
      'empty array' => [
        'expect' => [],
        'data' => [[], 100, 0],
      ],
    ];

    foreach ($elements as $type => $row) {
      $this->assertEquals($row['expect'], Data::paginateData($row['data'][0], $row['data'][1], $row['data'][2]), $type . 'failed' . PHP_EOL);
    }
  }

  public function testPaginateDataNormal()
  {
    $elements = [
      'all data' => [
        'expect' => $this->array,
        'data' => [$this->array, 100, 1],
      ],
      'paginate data page 1' => [
        'expect' => [1, 2, 3, 4, 5],
        'data' => [$this->array, 5, 1],
      ],
      'paginate data page 2' => [
        'expect' => [6, 7, 8, 9, 10],
        'data' => [$this->array, 5, 2],
      ],
      'paginate data page 10' => [
        'expect' => [],
        'data' => [$this->array, 5, 10],
      ],
    ];


    foreach ($elements as $type => $row) {
      $this->assertEquals($row['expect'], Data::paginateData($row['data'][0], $row['data'][1], $row['data'][2]), $type . ' failed' . PHP_EOL);
    }
  }

  public function testPaginateDataSpecialParam(){
    $elements = [
      'special param 2' => [
        'expect' => [],
        'data' => [$this->array, -1, 1],
      ],
      'special param 3' => [
        'expect' => [],
        'data' => [$this->array, 10, -2],
      ],
      'param 2 is string' => [
        'expect' => [],
        'data' => [$this->array, 'a', 1],
      ],
      'param 3 is string' => [
        'expect' => [],
        'data' => [$this->array, 10, 'b'],
      ],
    ];


    foreach ($elements as $type => $row) {
      $this->assertEquals($row['expect'], Data::paginateData($row['data'][0], $row['data'][1], $row['data'][2]), $type . ' failed' . PHP_EOL);
    }
  }
}
