<?php
require('fpdf/fpdf.php');
global $per, $an, $ban;
$per=$periodo;
$an=$anio;
$ban=0;
if(count($fila)>0){
	$ban=1;
}
class PDF extends FPDF{
	function Header(){
		date_default_timezone_set('America/Mexico_City');
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$dia=date('d');
		$mes=$meses[date('n')-1];
		$anio=date('Y');
		$imagen="fpdf/itc_logo.JPG";
		$this->SetXY(30, 20);
		$this->Cell(21, 21, '', 0);
		$this->Cell(21, 21, '', 1);
		$this->Image($imagen, 53, 23, 15, 15);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(105, 14, '', 1, 0);
		$this->SetXY(72, 20);
		$this->Cell(135, 7, utf8_decode('Nombre del documento: Formato para Programa de Visitas'), 0, 0);
		$this->SetXY(72, 26);
		$this->Cell(135, 7, utf8_decode('Aceptadas a Empresas'), 0, 0);
		$this->SetXY(177, 20);
		$this->Cell(50, 7, utf8_decode('Código: ITC-VI-PO-001-03'), 1, 2);
		$this->Cell(50, 7, utf8_decode('Revisión: 6'), 1, 1);
		$this->SetFont('Arial', 'B', 10);
		if ($this->PageNo()>1){$this->Cell(60, 7, '', 0);}
		else{$this->Cell(62, 7, '', 0);}
		$this->Cell(105, 7, utf8_decode('Referencia a la Norma ISO 9001:2008 7.2.1, 7.5.1'), 1, 0);
		$this->Cell(50, 7, utf8_decode('Página ').$this->PageNo().' de {nb}', 1, 1);
		$this->Ln();
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(260, 5, utf8_decode('INSTITUTO TECNOLÓGICO DE COLIMA'), 0, 1, 'C');
		$this->Cell(260, 5, utf8_decode('Subdirección de Planeación y Vinculación'), 0, 2, 'C');
		$this->Ln();
		$this->Cell(260, 5, utf8_decode('DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN'), 0, 2, 'C');
		$this->Cell(260, 5, utf8_decode('PROGRAMA DE VISITAS ACEPTADAS A EMPRESAS'), 0, 2, 'C');
		$this->Ln();
		$this->SetX(21);
		$this->SetFont('Arial', '', 10);
		$this->Cell(50, 5, utf8_decode('FECHA: '.$dia.' de '.$mes.' de '.$anio), 0);
		$this->Ln();
		$this->SetX(21);
		$this->Cell(50, 5, utf8_decode('PERIODO: '.$GLOBALS['per'].' '.$GLOBALS['an']), 0);
		$this->Ln();
		$this->Ln();
		$this->SetX(12);
		$this->SetFont('Arial', 'B', 9);
		if ($GLOBALS['ban']==1){
			$this->Cell(10, 12, utf8_decode('Núm.'), 1, 0, 'C');
			$this->Cell(25, 12, '', 1);
			$this->SetXY(17, 93);
			$this->Cell(30, 6, utf8_decode('Fecha de'), 0, 1, 'C');
			$this->SetXY(17, 99);
			$this->Cell(30, 6, utf8_decode('Visita'), 0, 0, 'C');
			$this->SetXY(47, 93);
			$this->Cell(30, 12, utf8_decode('Lugar'), 1, 0, 'C');
			$this->Cell(30, 12, utf8_decode('Empresa'), 1, 0, 'C');
			$this->Cell(16, 12, '', 1);
			$this->SetXY(107, 93);
			$this->Cell(16, 4, utf8_decode('No. de'), 0, 0, 'C');
			$this->SetXY(107, 97);
			$this->Cell(16, 4, utf8_decode('Alumnos'), 0, 0, 'C');
			$this->SetXY(107, 101);
			$this->Cell(8, 4, utf8_decode('M'), 1, 0, 'C');
			$this->Cell(8, 4, utf8_decode('H'), 1, 0, 'C');
			$this->SetXY(123, 93);
			$this->Cell(35, 12, utf8_decode('Docente responsable'), 1, 0, 'C');
			$this->Cell(21, 12, '', 1, 0, 'C');
			$this->SetXY(158, 93);
			$this->Cell(21, 4, utf8_decode('Horario'), 0, 0, 'C');
			$this->SetXY(158, 97);
			$this->Cell(21, 4, utf8_decode('de'), 0, 0, 'C');
			$this->SetXY(158, 101);
			$this->Cell(21, 4, utf8_decode('visita'), 0, 0, 'C');
			$this->SetXY(179, 93);
			$this->Cell(40, 12, '', 1, 0, 'C');
			$this->SetXY(179, 93);
			$this->Cell(40, 6, utf8_decode('Carrera y'), 0, 0, 'C');
			$this->SetXY(179, 99);
			$this->Cell(40, 6, utf8_decode('semestre'), 0, 0, 'C');
			$this->SetXY(219, 93);
			$this->Cell(50, 12, '', 1, 0, 'C');
			$this->SetXY(219, 93);
			$this->Cell(50, 4, utf8_decode('Estado que guarda'), 1, 0, 'C');
			$this->SetFont('Arial', '', 8);
			$this->SetXY(219, 97);
			$this->Cell(25, 4, utf8_decode('Realizada en'), 0, 0, 'C');
			$this->SetXY(219, 101);
			$this->Cell(25, 4, utf8_decode('fecha programada'), 0, 0, 'C');
			$this->SetXY(244, 97);
			$this->Cell(25, 8, '', 1, 0, 'C');
			$this->SetXY(244, 97);
			$this->Cell(25, 4, utf8_decode('Cumplimiento'), 0, 0, 'C');
			$this->SetXY(244, 101);
			$this->Cell(25, 4, utf8_decode('de objetivos'), 0, 1, 'C');
		}
	}

	function Footer(){
		$this->SetXY(20, 175);
		$this->SetFont('Arial', '', 10);
		$this->SetWidths(array(260));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array(utf8_decode('ING. JORGE ESTEBAN GONZÁLEZ VALLADARES')), 0);
		$this->SetXY(20, 180);
		$this->SetWidths(array(260));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array(utf8_decode('JEFE DEL DEPTO. DE GEST. TEC. Y VINCULACIÓN')), 0);
		$this->SetFont('Arial', 'B', 9);
		$this->SetXY(20, 190);
		$this->Cell(50, 5, utf8_decode('ITC-VI-PC-001-03'), 0, 0);
		$this->SetXY(250, 190);
		$this->Cell(20, 5, utf8_decode('Rev. 6'), 0, 0);
	}
}

$pdf=new PDF('L', 'mm', 'LETTER');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(12, 21, 12);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTitle('Reporte');
if(count($fila)>0){
	$pdf->SetFont('Arial', '', 9);
	$pdf->SetWidths(array(10, 25, 30, 30, 8, 8, 35, 21, 40, 25, 25));
	$pdf->SetAligns(array('L','L','L','L','L','L','L','L','L','L','L'));
	$no=1;
	foreach($fila as $data){
		$pdf->SetX(12);
		$fecha=($data->start)/1000;
		$Y=$pdf->GetY();
		if ($Y<=160){
			$pdf->Row(array(utf8_decode($no), utf8_decode(date('d-m-Y', $fecha)), utf8_decode($data->ciudad), utf8_decode($data->title), '', '', utf8_decode($data->body), utf8_decode($data->hora).' - '.utf8_decode($data->hora_regreso), utf8_decode($data->carrera).' / '.utf8_decode($data->semestre).utf8_decode('°'), '', ''), 0);
		}
		else{
			$pdf->AddPage();
			$pdf->SetFont('Arial', '', 9);
			$pdf->SetWidths(array(10, 25, 30, 30, 8, 8, 35, 21, 40, 25, 25));
			$pdf->SetAligns(array('L','L','L','L','L','L','L','L','L','L','L'));
			$pdf->Row(array(utf8_decode($no), utf8_decode(date('d-m-Y', $fecha)), utf8_decode($data->ciudad), utf8_decode($data->title), '', '', utf8_decode($data->body), utf8_decode($data->hora).' - '.utf8_decode($data->hora_regreso), utf8_decode($data->carrera).' / '.utf8_decode($data->semestre).utf8_decode('°'), '', ''), 0);
		}
		$no++;
	}
	$pdf->SetWidths(array(95, 8, 8, 35, 21, 40, 25, 25));
	$pdf->SetAligns(array('R','L','L','L','L','L','L','L'));
	$pdf->Row(array('SUBTOTALES','','','','','','',''), 0);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->SetWidths(array(111, 146));
	$pdf->SetAligns(array('L','C'));
	$pdf->Row(array('TOTAL DE ALUMNOS QUE SALIERON A VISITA: ','VISITAS: '), 0);
}
else{
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(260, 5, utf8_decode('NO HAY DATOS QUE MOSTRAR.'), 0, 0, 'C');
}

$pdf->Output('final.pdf', 'I');