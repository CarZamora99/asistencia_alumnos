<?php
$conx = new mysqli('localhost', 'root', 'zamora123', 'pase_lista');
$conx->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista</title>
	<link rel="stylesheet" href="Estilos.css">
	<link rel="stylesheet" href="style.css">
</head>
<body bgcolor="#80d4ff">
   <header>
		<div class="contenedor">
			</div>
			<nav>
				<ul>	
					<li><a href="javascript:history.back(-1);" class="icon-redo2"> Salir</a></li>
					<li><a href="#" class=" icon-user"> Roberto</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div style="text-align:left;padding:1em 0;"> <h4><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3522210"><span style="color:gray;">Hora actual en</span><br />Pachuca de Soto, México</a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FMexico_City" width="100%" height="90" frameborder="0" seamless></iframe> </div>
	<h1>Lista de asistencia</h1>
	<a href="add.php" class="btn-a"><span class="icon-user-plus"></span> Agregar nuevo</a>
	<br><br>
	<table>
		<thead>
		<tr>
			<th>No</th>
			<th>No Control</th>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>Apellido materno</th>
			<th>Correo</th>
			<th>Asistió</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
		</thead>
		<?php
		$sql="SELECT id_al,no_ctrl,nombre,ap_p,ap_m,correo FROM alumno WHERE grupo = 'A'";
		$result=mysqli_query($conx,$sql); 	
		while ($mostrar=mysqli_fetch_array($result)) {
			?>
			<tr>
				<td><?php echo $mostrar['id_al']?></td>
				<td><?php echo $mostrar['no_ctrl']?></td>
				<td><?php echo $mostrar['nombre']?></td>
				<td><?php echo $mostrar['ap_p']?></td>
				<td><?php echo $mostrar['ap_m']?></td>
				<td><?php echo $mostrar['correo']?></td>
<td><a href="Asist.php?id_al=<?php echo $mostrar["id_al"];?>" class="btn-edit"><span class=" icon-checkmark"></span> Asistencia</a></td>
<td><a href="Editar.php?no_ctrl=<?php echo $mostrar["no_ctrl"];?>" class="btn-edit"><span class="icon-wrench"></span> Editar</a></td>
<td><a href="Eliminar.php?no_ctrl=<?php echo $mostrar["no_ctrl"];?>" class="btn-delet"><span class="icon-user-minus"></span> Eliminar</a></td>
			</tr>
			<?php
		}
		?>
	</table>
	<br><br>
	<a href="pdf/submenu.php" class="btn-r"><span class="icon-printer"></span> Reporte</a>
	<a href="#" class="btn-g"><span class="icon-printer"></span> Reporte general</a>
	<script>
    function abrir(){
        document.getElementById("vent").style.display="block";
    }
    
    function cerrar(){
        document.getElementById("vent").style.display="none";
    }
 	
	</script>
</body>
</html>