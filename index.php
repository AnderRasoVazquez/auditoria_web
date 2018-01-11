<?php
include 'CaesarCipher.php';
$cipher = new CaesarCipher();
$ciphertext = $cipher->encrypt('DP0000000000000000000012', 4);
echo $ciphertext;
<<<<<<< HEAD
echo "<br>"
$plaintext = $cipher->decrypt($ciphertext, 4);
echo $plaintext;
=======
>>>>>>> 80d0f4430b5c131857020d9b7014a97c9bff5dbf
?>
