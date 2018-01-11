<?php
session_start();
session_unset();
session_destroy();
echo '<script> window.location="inicio.php"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Saliendo...</title>
    <meta charset="utf-8">
</head>
<body>
    <script language="javascript">location.href = "inicio.php";</script>
</body>
</html>
