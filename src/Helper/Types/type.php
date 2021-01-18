<?php

namespace Helper;

class TypeUtils {
  public static function getBoolean($data){
    return filter_var($data, FILTER_VALIDATE_BOOLEAN);
  }
  
  public static function getBool($data){
    return TypeUtils::getBoolean($data);
  }
}


