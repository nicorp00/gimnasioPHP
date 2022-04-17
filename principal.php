<?php
session_start();
session_destroy();
?>
<html>
<head>
<title>Iniciar sesion</title>
<meta charset="UTF-8">
</head>

<body>
<h1>Iniciar sesion</h1>
<form action="autenticacion.php" method="POST">
<p>DNI: <input type="text" name="dni"/></p>
<p><input type="submit" name="enviar" value="Enviar"/></p>
</form>
</body>
</html>