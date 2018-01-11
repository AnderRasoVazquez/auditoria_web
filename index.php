<<?php
  $s = 'pene';
  $hash = password_hash($s, PASSWORD_DEFAULT);
  $c = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, '1234567812345678', $s, MCRYPT_MODE_ECB);
  echo $c;
  echo '<br>';
  $d = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, '1234567812345678', $c, MCRYPT_MODE_ECB);
  echo $d;
  //substr($hash, 7, 16)
?>
