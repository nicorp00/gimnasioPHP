<html>
<head>
<script>
function showCD(str) {
    if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
    } else {
        document.getElementById("txtHint").innerHTML = "";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var hint = document.getElementById("txtHint");

            var resp = JSON.parse(this.response);
            
            var p = document.createElement("p");
            p.innerHTML ="Agenda del socio " + resp[0]["cliente"];
            hint.appendChild(p);
            
            var tabla = document.createElement("table");
            tabla.border = 2;
            hint.appendChild(tabla);
            tabla.width="20%";
            
            var tr = document.createElement("tr");
            tabla.appendChild(tr);
            var th = document.createElement("th");
            tr.appendChild(th);
            th.innerHTML = "Actividad";
            var ths = document.createElement("th");
            tr.appendChild(ths);
            ths.innerHTML = "Monitor";
            
            for (var i = 0 ; i < resp.length ; i++){
            var trs = document.createElement("tr");
            tabla.appendChild(trs);
            var td = document.createElement("td");
            trs.appendChild(td);
            td.innerHTML = resp[i]["actividad"];
            var tds = document.createElement("td");
            trs.appendChild(tds);
            tds.innerHTML = resp[i]["monitor"];
            }
        }
        };
        xmlhttp.open("GET","agenda.php?q="+str,true);
        xmlhttp.send();
        }
}

function usuarios() {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        
      var seleccion = document.getElementById("seleccion");
      
      var respuesta = JSON.parse(this.response);
        for (var i = 0 ; i < respuesta.length ; i++){
            var opcion = document.createElement("option");
            opcion.innerHTML = respuesta[i]["apellido"];
            opcion.value = respuesta[i]["dni"];
            seleccion.appendChild(opcion);
        }
      
    }
  };
  xmlhttp.open("GET","socios.php",true);
  xmlhttp.send();
}


</script>
</head>
<body>

<form>
    Selecciona un socio:
    <select name="nombre" onchange="showCD(this.value)" id="seleccion"></select>
    <script type = "text/javascript">usuarios();</script>
</form>
<div id="txtHint"><b>La información del socio se verá aquí...</b></div>

      <a href="pag_admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
      
</body>
</html>