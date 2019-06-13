<?php
$conx = new mysqli('localhost', 'root', 'zamora123', 'pase_lista');
$conx->set_charset("utf8");

if(!empty($_REQUEST['no_ctrl'])){
		$Nctrl = $_REQUEST['no_ctrl'];
		$query_delete = mysqli_query($conx,"DELETE FROM alumno WHERE no_ctrl=$Nctrl");
			if($query_delete){
				header("location: entrada.php");
			}else{
				echo "Error al eliminar";
			}
	}
?>

