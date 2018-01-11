<?php
include 'CaesarCipher.php';
$cipher = new CaesarCipher();
$ciphertext = $cipher->encrypt('DP0000000000000000000012', 4);
echo $ciphertext;
echo "<br>"
$plaintext = $cipher->decrypt($ciphertext, 4);
echo $plaintext;
?>
