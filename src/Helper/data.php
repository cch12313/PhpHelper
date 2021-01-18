<?php

namespace Helper;

class Data
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
    if (!is_numeric($length)) {
      return $result;
    }
    $length = (int)$length;

    if (!is_numeric($page)) {
      return $result;
    }
    $page = (int)$page;
    $len = 0;
    $offset = ($page - 1) * $length;


    if ($length < 1 || $page < 1 || !is_array($dataList)) {
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

  /**
   * get client user's ip
   * @return String user's ip
   */
  public static function getClientIP()
  {
    $ip = '';
    if (getenv("HTTP_CLIENT_IP")) {
      $ip = getenv("HTTP_CLIENT_IP");
    } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
      $ip = getenv("HTTP_X_FORWARDED_FOR");
    } elseif (getenv("REMOTE_ADDR")) {
      $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
  }
}
