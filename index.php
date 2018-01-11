<?php
function encriptarNumCuenta($key, $num) {
    $chars = str_split($num);

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
    return $result;
}

function desencriptarNumCuenta($key, $numEnc){
    $result = "";
    for ($i=0; $i < strlen($numEnc); $i++) {
        if ($i<2){
            $result .= $numEnc[$i];
        } else {
            $pos = strpos($key, $numEnc[$i]);
            $result .= strval($pos);
        }
    }
    return $result;
}

$num = "DP1052056780366787899212";
$key = "ZQEROKTIAD";  // 10 letras diferentes

echo $num;
echo "<br>";
$numEnc = encriptarNumCuenta($key, $num);
echo $numEnc;
echo "<br>";
$numDesEnc = desencriptarNumCuenta($key, $numEnc);
echo $numDesEnc;
?>
