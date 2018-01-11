<?php

  function encriptarNumCuenta($num) {
      $chars = str_split($num);
      $key = keyGenerator();

      $result = "";
      foreach($chars as $char){
          // your code
          if (is_numeric($char)){
              // $result += $key[intval($char)];
              $result .= $key[intval($char)];
          } else {
              $result .= $char;
          }
      }
      return $key . $result;
  }

  function desencriptarNumCuenta($num){
      $result = "";
      $key = substr($num, 0, 10);
      $numC = substr($num, -24);
      for ($i=0; $i < strlen($numC); $i++) {
          if ($i<2){
              $result .= $numC[$i];
          } else {
              $pos = strpos($key, $numC[$i]);
              $result .= strval($pos);
          }
      }
      return $result;
  }

  function keyGenerator($length=10){
      $base = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $result = "";
      for ($i=0; $i < $length ; $i++) {
          $randChar = $base[rand(0, strlen($base) - 1)];
          $base = str_replace($randChar, '', $base);
          $result .= $randChar;
      }
      return $result;
  }

?>
