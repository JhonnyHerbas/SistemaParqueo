<?php 
require("../../vendor/PDF/fpdf.php");
class PDF extends FPDF
{
    public $mes;
    
    function Header()
    {
        //logo
        $this->Ln(10);
        $this->Image('../../public/img/FCYT.png',20,20,20,20);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->MultiCell(160,7,trim(utf8_decode("Informe del mes de ".$this->mes."\nSistema de parqueo facultad de ciencias y tecnológica\nUniversidad Mayor de San Simón")),0,'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        date_default_timezone_set('America/La_Paz');
        $this->Cell(210,10,utf8_decode("Sistema de parqueo facultad de ciencias y tecnológica") .' - '. date("Y-m-d H:i:s"),0,1,'C');
    }
}
?>