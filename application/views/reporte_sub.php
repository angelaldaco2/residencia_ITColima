<?php
require('fpdf/fpdf.php');
global $departamento, $ban;
$ban=0;
if(count($fila)>0){
	$ban=1;
	foreach($fila as $data){}
	switch ($data->carrera) {
		case 'Arquitectura':
			$departamento="CIENCIAS DE LA TIERRA";
			break;
		case 'Contador Público':
		case 'Licenciatura en Administración':
			$departamento="CIENCIAS ECONÓMICO ADMINISTRATIVAS";
			break;
		case 'Ingeniería Industrial':
		case 'Ingenería en Gestión Empresarial':
			$departamento='INDUSTRIAL';
			break;
		case 'Ingenería Mecatrónica':
			$departamento='ELÉCTRICA Y ELECTRÓNICA';
			break;
		case 'Ingenería Bioquímica':
		case 'Ingenería Ambiental':
			$departamento='QUÍMICA Y BIOQUÍMICA';
			break;
		case 'Ingenería en Sistemas Computacionales':
		case 'Ingenería Informática':
			$departamento="SISTEMAS Y COMPUTACIÓN";
			break;
		default:
			break;
	}
}

class PDF extends FPDF{
	function Header(){
		date_default_timezone_set('America/Mexico_City');
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$dia=date('d');
		$mes=$meses[date('n')-1];
		$anio=date('Y');
		$mes_periodo=date("n");
		if ($mes_periodo>=1 and $mes_periodo<=6){
			$periodo="Enero - Junio";
		}
		if ($mes_periodo>=8 and $mes_periodo<=12){
			$periodo="Agosto - Diciembre";
		}
		$imagen="fpdf/itc_logo.JPG";
		$this->SetXY(0, 20);
		$this->Cell(21, 21, '', 0);
		$this->Cell(21, 21, '', 1);
		$this->Image($imagen, 23, 23, 15, 15);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(95, 14, '', 1, 0);
		$this->SetXY(42, 20);
		$this->Cell(95, 7, utf8_decode('Nombre del documento: Formato para Solicitud de'), 0, 0);
		$this->SetXY(42, 26);
		$this->Cell(95, 7, utf8_decode('Visitas a Empresas'), 0, 0);
		$this->SetXY(137, 20);
		$this->Cell(50, 7, utf8_decode('Código: ITC-VI-PC-001-01'), 1, 2);
		$this->Cell(50, 7, utf8_decode('Revisión: 6'), 1, 1);
		$this->SetFont('Arial', 'B', 10);
		if ($this->PageNo()>1){$this->Cell(30, 7, '', 0);}
		else{$this->Cell(32, 7, '', 0);}
		$this->Cell(95, 7, utf8_decode('Referencia a la Norma ISO 9001:2008 7.2.1, 7.5.1'), 1, 0);
		$this->Cell(50, 7, utf8_decode('Página ').$this->PageNo().' de {nb}', 1, 1);
		$this->Ln();
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(200, 5, utf8_decode('INSTITUTO TECNOLÓGICO DE COLIMA'), 0, 1, 'C');
		$this->Cell(200, 5, utf8_decode('Subdirección de Planeación y Vinculación'), 0, 2, 'C');
		$this->Ln();
		$this->Cell(200, 5, utf8_decode('DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN'), 0, 2, 'C');
		$this->Cell(200, 5, utf8_decode('SOLICITUD DE VISITAS A EMPRESAS'), 0, 2, 'C');
		$this->Ln();
		$this->SetX(21);
		$this->SetFont('Arial', '', 10);
		$this->Cell(50, 5, utf8_decode('FECHA: '.$dia.' de '.$mes.' de '.$anio), 0);
		$this->Ln();
		$this->SetX(21);
		$this->Cell(50, 5, utf8_decode('PERIODO: '.$periodo.' '.date('Y')), 0);
		$this->Ln();
		$this->Ln();
		$this->SetX(12);
		$this->SetFont('Arial', 'B', 9);
		$this->SetWidths(array(8, 30, 35, 22, 35, 17, 40));
		$this->SetAligns(array('C','C','C','C','C','C','C'));
		if ($GLOBALS['ban']==1){
			$this->Rowt(array("No.", "Empresa / Ciudad", utf8_decode("Área a observar y objetivo"), "Fecha / Turno", "Carrera / Semestre", "No. de alumnos","Solicitante / Asignatura"), 0);
		}
	}

	function Footer(){
		$this->SetXY(20, 250);
		$this->SetFont('Arial', '', 10);
		$this->SetWidths(array(70));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array('NOMBRE Y FIRMA'), 0);
		$this->SetXY(20, 255);
		$this->SetWidths(array(70));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array(utf8_decode('JEFE DEL DEPTO. DE '.$GLOBALS['departamento'])), 0);
		$this->SetXY(125, 250);
		$this->SetWidths(array(70));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array('Vo. Bo.'), 0);
		$this->SetXY(125, 255);
		$this->SetWidths(array(70));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array('NOMBRE Y FIRMA'), 0);
		$this->SetXY(125, 260);
		$this->SetWidths(array(70));
		$this->SetAligns(array('C'));
		$this->Rowsinlinea(array(utf8_decode('SUBDIRECTOR ACADÉMICO')), 0);
		$this->SetFont('Arial', '', 9);
		$this->SetXY(20, 270);
		$this->Cell(50, 5, utf8_decode('c.c.p Subdirección Académica'), 0, 1);
		$this->SetXY(20, 275);
		$this->Cell(50, 5, utf8_decode('c.c.p Archivo'), 0, 0);
		$this->SetFont('Arial', 'B', 9);
		$this->SetXY(20, 285);
		$this->Cell(50, 5, utf8_decode('ITC-VI-PC-001-01'), 0, 0);
		$this->SetXY(180, 285);
		$this->Cell(50, 5, utf8_decode('Rev. 6'), 0, 0);
	}
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(['P']);
$pdf->SetMargins(12, 21, 12);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTitle('Reporte');
if(count($fila)>0){
	$pdf->SetFont('Arial', '', 9);
	$pdf->SetWidths(array(8, 30, 35, 22, 35, 17, 40));
	$pdf->SetAligns(array('L','L','L','L','L','L','L'));
	$no=1;
	foreach($fila as $data){
		$pdf->SetX(12);
		$Y=$pdf->GetY();
		if ($Y<=240){
			$pdf->Row(array(utf8_decode($no), utf8_decode($data->empresa)." / ".utf8_decode($data->ciudad), utf8_decode($data->area_observar).' / '.utf8_decode($data->objetivo), utf8_decode($data->fecha_visita).' / turno '.utf8_decode($data->turno), utf8_decode($data->carrera).' / '.utf8_decode($data->semestre).utf8_decode('° semestre'), utf8_decode($data->no_alumnos), utf8_decode($data->docente).' / '.utf8_decode($data->materia)), 0);
		}
		else{
			$pdf->AddPage(['P']);
			$pdf->SetFont('Arial', '', 9);
			$pdf->SetWidths(array(8, 30, 35, 22, 35, 17, 40));
			$pdf->SetAligns(array('L','L','L','L','L','L','L'));
			$pdf->Row(array(utf8_decode($no), utf8_decode($data->empresa)." / ".utf8_decode($data->ciudad), utf8_decode($data->area_observar).' / '.utf8_decode($data->objetivo), utf8_decode($data->fecha_visita).' / turno '.utf8_decode($data->turno), utf8_decode($data->carrera).' / '.utf8_decode($data->semestre).utf8_decode('° semestre'), utf8_decode($data->no_alumnos), utf8_decode($data->docente).' / '.utf8_decode($data->materia)), 0);
		}
		$no++;
	}
}
else{
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(210, 5, utf8_decode('NO HAY DATOS DE ESTA CARRERA.'), 0, 0, 'C');
}

$pdf->Output('reporte.pdf', 'I');