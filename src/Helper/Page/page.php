<?php

namespace Helper\Page;

class PageUtils
{
  /**
   * paginate data by offset and length
   * @param arrayOfData
   * @param offset 
   * @param length
   * 
   */
  public static function paginateData($dataList, $length = 10, $page = 1)
  {
    $result = [];
    if(!is_numeric($length)){
      return $result;
    }
    $length = (int)$length;

    if(!is_numeric($page)){
      return $result;
    }
    $page = (int)$page;
    $len = 0;
    $offset = ($page - 1) * $length;


    if($length < 1 || $page < 1 || !is_array($dataList)){
      return $result;
    }

    foreach ($dataList as $index => $data) {
      if ($index < $offset) {
        continue;
      }
      if ($len == $length) {
        break;
      }
      $result[] = $data;
      $len++;
    }
    return $result;
  }
}
