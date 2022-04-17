<?php

            $cadena_conexion = 'mysql:dbname=gimnasio;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM socio';
            $alumno = $bd -> query($sql);
            $array = $alumno -> fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($array);
            echo $json;
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }



