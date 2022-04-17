
<html>
  <head>
    <title>Pagina de socio normal</title>
  </head>
  <body>
      
<?php
session_start();

$cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    echo "<table border='1'>
          <tr>
            <td>Cliente</td>
            <td>Actividad</td>
            <td>Monitor</td>
          </tr>
    ";
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión establecida<br><br>';
    $agenda = 'SELECT * FROM agenda INNER JOIN socio ON agenda.cliente = socio.dni INNER JOIN actividad ON agenda.actividad = actividad.identificador where socio.dni like"'.$_SESSION["dni"].'"';
    
    $usuarios = $bd->query($agenda);
    foreach ($usuarios as $usu){
        echo "<tr>
                <td>".$usu["cliente"]."</td>
                <td>".$usu["actividad"]."</td>
                <td>".$usu["monitor"]."</td>
              </tr>"
        ;
    }
    

    echo "</table>";
    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }

?>
      
      <a href="principal.php">Cerrar sesion</a>

  </body>
</html>