<?php 
    include '../models/funcionAdmin.php';
    include '../helpers/formatoPDF.php';

    /*Obtenemos el anio y mes del metodo GET */
    $anio = $_GET['anio'];
    $sem = $_GET['semana']+1;
    
    $mes = strtolower($_GET['semana_text'] . ' semana ' .$sem);
    $semana = $_GET['semana'];

    $pdf = new PDF();
    $pdf->mes = $mes;

    $pdf->AddPage();        
    
    if($reportes = obtener_reporte_semanal_pdf($semana,$anio)) {
        $pdf->SetFont('Arial','B',10); // Establecemos la fuente en negrita
        $pdf->Cell(10,10,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(20,10,'Sitio',1,0,'C');
        $pdf->Cell(60,10,'Docente',1,0,'C');
        $pdf->Cell(40,10,'Fecha asignado',1,0,'C');
        $pdf->Cell(30,10,'Ingreso',1,0,'C');
        $pdf->Cell(30,10,'Deudas',1,1,'C');
        $i = 1;
        while ($reporte = $reportes->fetch_array(MYSQLI_BOTH)){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10, 10, $i, 1,0,'C');
            $pdf->Cell(20, 10, $reporte['NOMBRE_SIT'], 1,0,'C');
            $pdf->Cell(60, 10, $reporte['NOMBRE_DOC'] .$reporte['APELLIDO_DOC'], 1,0,'C');
            $pdf->Cell(40, 10, $reporte['FECHA_ASI'], 1,0,'C');
            $pdf->Cell(30, 10, $reporte['TOTAL_MONTO']. ' PARCK', 1,0,'C');
            $deuda = obtener_deudas($reporte['FECHA_ASI'],$reporte['NUM_FACTURAS']);
            $pdf->Cell(30, 10, $deuda, 1,0,'C');
            $pdf->Ln();
            $i=$i+1;
        }
    }

    $pdf-> Output();
    function obtener_deudas($fecha,$can){
        $fecha =new DateTime($fecha);
        $fecha_actual = new DateTime(date('Y-m-d'));

        $interval = $fecha->diff($fecha_actual);
        $meses = $interval->format('%s');

        $resta = $meses - $can;
        if($resta>0){
            return $resta*130 . ' PARCK';
        }else{
            return "Sin deudas";
        }        
    }
?>