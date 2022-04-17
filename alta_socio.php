<?php
if (isset ($_POST["dni"]) && isset ($_POST["apellido"]) && isset ($_POST["telefono"]) && isset ($_POST["cuota"]) && isset ($_POST["tipo_usuario"]) ){
$cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'INSERT INTO socio VALUES ("'.$_POST["dni"].'" , "'.$_POST["apellido"].'" , "'.$_POST["telefono"].'" , '.$_POST["cuota"].' , '.$_POST["tipo_usuario"].')';
    $bien = $bd->query($sql);
    if($bien){
        echo "Socio insertado correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Dar de alta socios</title>
  </head>
  <body>
      <h1>Dar de alta socios</h1>
    <form action="alta_socio.php" method="POST">
        <input type="text" name="dni" placeholder="DNI">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="text" name="telefono" placeholder="Telefono">
        <input type="text" name="cuota" placeholder="Cuota">
        <select name="tipo_usuario">
            <option value="0">Admin</option>
            <option value="1">Normal</option>
        </select>
        <p><input type="submit" name="enviar" value="Añadir"/></p>
    </form>
      <a href="pag_admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>