<?php

namespace Helper;

class Type {
  public static function getBoolean($data){
    return filter_var($data, FILTER_VALIDATE_BOOLEAN);
  }
  
  public static function getBool($data){
    return Type::getBoolean($data);
  }
}


