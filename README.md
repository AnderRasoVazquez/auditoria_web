# Creación del usuario para este proyecto

Para poder hacer esto hay que asegurarse de que el servidor de MySQL de Xampp esté iniciado.

```
$server = "localhost";
$user = "Xdperez067";
$passw = "AVmu8sW4r";
$bd = "Xdperez067_db_auditoria_sgssi";
```


1. Entrar al MySQL de Xampp:
    + `/opt/lampp/bin/mysql -uroot` (por defecto no tiene contraseña)
2. Desde la consola de MySQL de Xampp:
    + `CREATE USER 'Xdperez067'@'localhost' IDENTIFIED BY 'AVmu8sW4r';`
    + `GRANT ALL PRIVILEGES ON * . * TO 'Xdperez067'@'localhost';`

Ahora ya tenemos el usuario creado y si quisiéramos podríamos entrar a la consola de MySQL con él con la contraseña `AVmu8sW4r`:

+ `/opt/lampp/bin/mysql -u Xdperez067 -p`
