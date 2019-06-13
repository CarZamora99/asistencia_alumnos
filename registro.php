<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
	
</head>
<body background="img/FB_IMG_1526617808515.jpg" height="300">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<form id="frmRegistro">
						<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" name="">
					<label>Paterno</label>
					<input type="text" class="form-control input-sm" id="paterno" name="">
					<label>Materno</label>
					<input type="text" class="form-control input-sm" id="materno" name="">
					<label>Usuario</label>
					<input type="text" class="form-control input-sm" id="usuario" name="">
					<label>Password</label> <i class=" fa fa-eye " id="show">= </i>
					<input type="password" name="pass" id="pass" class="form-control input-sm">
					<p></p>
					<span class="btn btn-warning" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-default">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
<script src="js/jquery.mi.js"></script>
	<script src="bootstrap.min.js"></script>
	<script src="http://use.fontawesome.com/e622d3b53e.js"></script>
	<script src="js/index.js"></script>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#paterno').val()==""){
				alertify.alert("Debes agregar el apellido paterno");
				return false;
			}else if($('#materno').val()==""){
				alertify.alert("Debes agregar el apellido materno");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&paterno=" + $('#paterno').val() +
					"&materno=" + $('#materno').val() +
					"&usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

