<?php
if (isset ($_POST["nombre"]) && isset ($_POST["actividad"])){
$cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'INSERT INTO agenda VALUES ("'.$_POST["nombre"].'" , "'.$_POST["actividad"].'" , "'.$_POST["monitor"].'") ';
    $bien = $bd->query($sql);
    if($bien){
        echo "Monitor asociado correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Asignar monitores</title>
  </head>
  <body>
      <h1>Asignar monitores</h1>
      <form action="asignar_monitor.php" method="POST">
      <select name="nombre">
          <?php
            $cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM socio WHERE tipo_usuario LIKE 1';
            $alumnos = $bd->query($sql);
            foreach ($alumnos as $alu){
            echo "<option value=".$alu["dni"]."> ". $alu["apellido"] . " " . $alu["telefono"] ."</option>";
            }
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }
          ?>
      </select>
      <select name="actividad">
          <?php
            $cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM actividad';
            $asignaturas = $bd->query($sql);
            foreach ($asignaturas as $asig){
            print "<option value=".$asig["identificador"]."> ". $asig["nombre"] ."</option>";
            }
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }
          ?>
      </select>
    
          <input type="text" name="monitor" placeholder="Nombre del monitor">
          
        <p><input type="submit" name="enviar" value="Enviar"/></p>
    </form>
      <a href="pag_admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>