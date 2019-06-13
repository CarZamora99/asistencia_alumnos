<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Asistencia</title>
</head>
<body bgcolor="#00BFFF">
<h1>Pase de lista</h1>
<?php
$conx = new mysqli('localhost', 'root', 'zamora123', 'pase_lista');
$conx->set_charset("utf8");
if (isset($_POST["estado"])){
$estado=$_POST["estado"];
$id_al=$_REQUEST['id_al'];

$nuevo_usuario=mysqli_query($conx,"SELECT * FROM asistencia WHERE fecha=CURDATE() and id_al=$id_al");
  if(mysqli_num_rows($nuevo_usuario)>0){
      ?>
    <script type="text/javascript">
        alert("Este alumno ya tiene asistencia");
      </script>
      <?php
    }
    else{
$sql = "INSERT INTO asistencia(id_al,fecha,estado) VALUES ('$id_al',CURDATE(),'$estado')";
		if ($conx->query($sql) === TRUE) {
    	header("location: entrada.php");
		} 
		else {
    	echo "Error: " . $sql . "<br>" . $conx->error;
		}
}
}
	else{
		echo "<h2>Por favor selecciona una opcion: </h2>";
  }

     ?>
<div class="centrado">
<fieldset>
<form method="POST" action="">
	<select name="estado" class="select-css">
		<option value="Asistio" selected>Si asistio</option>
		<option value="Falto">No asistio</option>
		<option value="Retardo">Retardo</option>
	</select>
	<br>
	<button type="submit" class="button">Ingresar</button>
	</form>
</fieldset>
</div>

<style type="text/css">
.select-css {
 display: block;
 font-size: 16px;
 font-family: 'Arial', sans-serif;
 font-weight: 400;
 color: #444;
 line-height: 1.3;
 padding: .4em 1.4em .3em .8em;
 width: 400px;
 max-width: 100%; 
 box-sizing: border-box;
 margin: 0;
 border: 1px solid #aaa;
 box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
 border-radius: .3em;
 -moz-appearance: none;
 -webkit-appearance: none;
 appearance: none;
 background-color: #fff;
 background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
   linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
 background-repeat: no-repeat, repeat;
 background-position: right .7em top 50%, 0 0;
 background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
 display: none;
}
.select-css:hover {
 border-color: #888;
}
.select-css:focus {
 border-color: #aaa;
 box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
 box-shadow: 0 0 0 3px -moz-mac-focusring;
 color: #222; 
 outline: none;
}
.select-css option {
 font-weight:normal;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 12px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

 .centrado{
  width: 300px;
   height: 200px;
   position: absolute;
   top: 30%;
   left: 40%;
   margin-top: -75px;
   margin-left: -75px;
}
</style>

</body>
</html>