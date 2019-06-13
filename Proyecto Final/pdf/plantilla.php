<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF {
		function Header()
		{
			$this->Image('logo.png',5,5,30);
			$this->SetFont('Arial','B','15');
			$this->Cell(30);
			$this->Cell(120,10,'Reporte de Asistencia',1,1,'C');

			$this->Ln(20);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I','8');
			$this->Cell(0,10,'Programacion II. Instituto Tecnologico de Pachuca',0,0,'C');
		}

	}
?>