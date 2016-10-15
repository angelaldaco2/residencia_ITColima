<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportesub extends CI_Controller {
    public function index(){
        $this->load->model('solicitudes_model');
        $this->load->library('pdf');
        $solicitud=$this->solicitudes_model->mostrar_aceptadas_reporte_sub();

        $this->pdf=new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();

        $this->pdf->SetTitle("Lista de alumnos");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200, 200, 200);
        $this->pdf->SetFont('Arial', 'B', 9);

        // $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
        $this->pdf->Cell(14, 7, 'Empresa', 'TBL', 0, 'C', '1');
        $this->pdf->Cell(24, 7, 'Ciudad', 'TB', 0, 'L', '1');
        $this->pdf->Cell(25, 7, 'Fecha', 'TB', 0, 'L', '1');
        $this->pdf->Cell(25, 7, 'Carrera', 'TB', 0, 'L', '1');
        $this->pdf->Cell(40, 7, 'Semestre', 'TB', 0, 'C', '1');
        $this->pdf->Cell(25, 7, 'Maestro', 'TB', 0, 'L', '1');
        $this->pdf->Ln(7);
        $x=1;
        foreach ($solicitud as $data){
            $this->pdf->Cell(15, 5, $x++, 'BL', 0, 'C', 0);
            $this->pdf->Cell(25, 5, $data->empresa, 'B', 0, 'L', 0);
            $this->pdf->Cell(25, 5, $data->ciudad, 'B' ,0, 'L', 0);
            $this->pdf->Cell(25, 5, $data->fecha_visita, 'B', 0, 'L', 0);
            $this->pdf->Cell(40, 5, $data->carrera, 'B', 0, 'C', 0);
            $this->pdf->Cell(25, 5, $data->semestre, 'B', 0, 'L', 0);
            $this->pdf->Cell(25, 5, $data->docente, 'BR', 0, 'C', 0);
            $this->pdf->Ln(5);
        }

        // I = Muestra el pdf en el navegador
        // D = Envia el pdf para descarga
        $this->pdf->Output("Lista de alumnos.pdf", 'I');
    }
}