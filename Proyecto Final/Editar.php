<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar</title>
</head>
<style type="text/css">
	body{
		font-family: Arial;
		box-sizing: border-box;
	}
	form{
		background-color: white;
		font-size: 12px;
		padding: 20px;
		color: #999;
		width: 300px;
		margin: 0 auto;
	}
	input,select{
		border: 0;
		outline: none; 
		width: 200px;
		width: 280px;
	}
	.field{
		border: solid 1px #ccc;
		padding: 10px;
	}
	.field:focus{
		border-color: #1183c9; 
	}
	.center-content{
		text-align: center;
	}
	/*Estilos boton*/
	.btn{
		border-radius: 3px;
		display: inline-block;
		padding: 20px 15px;
		text-decoration: none;
		text-shadow: 0 1px  0 rgba(255,255,255,0.3);
		box-shadow: 0 1px 1px rgba(0,0,0,0.3);
	}
	.btn-green{
		color: white;
		background-color: #3CC93f;
	}
	.btn-green:hover{
		background-color: #37B839;
	}
	.btn-green:active{
		background-color: #29962A;
	}
	.rm{
		width: 20px;
	}
	.rf{
		width: 20px;
	}
</style>
<body bgcolor="#4b8ab1">
	<h1 align="center">Editar Alumno</h1>
	<form action="" method="POST">
		<p>Nombre:</p>
		<input type="text" name="nombre" class="field">
		<p>Apellido paterno:</p>
		<input type="text" name="ap" class="field">
		<p>Apellido materno:</p>
		<input type="text" name="am" class="field">
		<p>Genero:</p>
	<input type="radio" class="rm" name="gender" value="M" checked>Masculino
	<input type="radio" class="rf" name="gender" value="F" >Femenino<br>
		<p>Número de control:</p>
		<input type="number" name="nc" class="field">
		<p>Correo:</p>
		<input type="email" name="correo" class="field">
		<p>Grupo:</p>
		<select name="group">
		<option value="A">A</option>
		<option value="B">B</option>
	</select>
	<p class="center-content"><input type="submit" class="btn btn-green" value="Actualizar"></p>
	</form>
</body>
</html>
<?php
	$conx = new mysqli('localhost', 'root', 'zamora123', 'pase_lista');
	$conx->set_charset("utf8");
	

if (isset($_POST["nombre"], $_POST["ap"], $_POST["am"], $_POST["gender"], $_POST["nc"], $_POST["correo"], $_POST["group"]) and $_POST["nombre"] !="" and $_POST["ap"]!="" and $_POST["am"]!="" and $_POST["gender"]!="" and $_POST["nc"]!=0 and $_POST["correo"]!="" and $_POST["group"]!=""){
	$claveU = $_REQUEST['no_ctrl'];
	$nombre=$_POST["nombre"];
	$apep=$_POST["ap"];
	$apem=$_POST["am"];
	$genero=$_POST["gender"];
	$nc=$_POST["nc"];
	$correo=$_POST["correo"];
	$grupo=$_POST["group"];
		if($grupo=='A'){
$sql = mysqli_query($conx,"UPDATE alumno SET no_ctrl='$nc',nombre='$nombre',ap_p='$apep',ap_m='$apem',genero='$genero',grupo='$grupo',correo='$correo' WHERE no_ctrl=$claveU");
		
		if($sql){
    	header("location: entrada.php");
		} 
		else {
		echo "Error al modificar el registro";
		}
	}
	else{
		}
		
	}
	else{
		?>
		<script type="text/javascript">
			alert("Por favor llenar correctamente");
		</script>

		<?php
	}
	?>