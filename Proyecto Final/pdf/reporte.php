<?php
	include('plantilla.php');

	$conx = new mysqli('localhost', 'root', 'zamora123', 'pase_lista');
	$conx->set_charset("utf8");
	$fecha=$_POST['fecha'];

		$sql="SELECT alumno.nombre,alumno.ap_p,alumno.ap_m,asistencia.estado FROM alumno INNER JOIN asistencia ON alumno.id_al=asistencia.id_al WHERE asistencia.fecha='$fecha'";	
		$result=mysqli_query($conx,$sql); 	

	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,20,'Fecha: '.date('d/m/Y'),0,1,'R');
	$pdf->SetFillColor(97,161,85);
	$pdf->Cell(50,6,'Nombre',1,0,'C',1);
	$pdf->Cell(50,6,'Apellido paterno',1,0,'C',1);
	$pdf->Cell(50,6,'Apellido materno',1,0,'C',1);
	$pdf->Cell(40,6,'Observacion',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	$pdf->SetFillColor(232,232,232);
	
	while ($mostrar = $result->fetch_assoc()) {
		$pdf->Cell(50,6,$mostrar['nombre'],1,0,'C',1);
		$pdf->Cell(50,6,$mostrar['ap_p'],1,0,'C',1);
		$pdf->Cell(50,6,$mostrar['ap_m'],1,0,'C',1);
		$pdf->Cell(40,6,$mostrar['estado'],1,1,'C',1);
	}

	$pdf->Output();

?>