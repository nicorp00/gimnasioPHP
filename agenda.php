<?php

$q = ($_GET['q']);

            $cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = "SELECT * FROM agenda INNER JOIN socio ON agenda.cliente = socio.dni INNER JOIN actividad ON agenda.actividad = actividad.identificador where socio.dni like '".$q."'";
            $alumno = $bd -> query($sql);
            $array = $alumno -> fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($array);
            echo $json;
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }



