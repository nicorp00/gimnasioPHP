<?php
if (isset ($_POST["nombre"])){
$cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'DELETE FROM socio WHERE dni = "'.$_POST["nombre"].'"';
    $bien = $bd->query($sql);
    if($bien){
        echo "Socio eliminado correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Eliminar alumno</title>
  </head>
  <body>
      <h1>Eliminar alumno</h1>
      <form action="eliminar_socio.php" method="POST">
      <select name="nombre">
          <?php
            $cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM socio';
            $alumnos = $bd->query($sql);
            foreach ($alumnos as $alu){
            echo "<option value=".$alu["dni"]."> ". $alu["apellido"] . " " . $alu["telefono"] ."</option>";
            }
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }
          ?>
      </select>
          
        <p><input type="submit" name="enviar" value="Eliminar"/></p>
    </form>
      <a href="pag_admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>