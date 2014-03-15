<?php 
session_cache_limiter("private, must-revalidate");
require_once("config.php");
require_once("access_db.php");

if (!isset($_GET['keyPlaca'])) {
    exit;
}

define('FPDF_FONTPATH', 'font/');
require_once('fpdf/fpdf.php');

// Datos del proposal 

class PDF extends FPDF {

    //Page header
    var $dblink;

    function getName() {
        return $this->dblink;
    }

    function Header() {
       $this->Image('verilogo.jpg',10,8,33);
        // Arial bold 15
        $this->SetFont('Verdana','B',35);
        // Movernos a la derecha
        $this->Cell(40);
        // Título
        $this->Cell(30,25,'AUTO REPORT',0,0,'L');
       
        $this->Image('logo_muni.jpg',157,16,33);
        // Salto de línea
        $this->Rect(10,8,190,25 ,'D');
                
        $this->Ln(20);
        $this->Image('fondo.png',10,40,0);
      
    }

    //Page footer
    function Footer() {
        //llamada de data
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('Arial', '', 8);
        $this->SetY(-20);
        $this->Rect(35,258,130,10 ,'DF');
        $this->Cell(50, 5.5, "ATENCION:", 0, 0, "R");
        $this->Cell(140, 5.5, " Es recomendo la confirmacion de estos datos con la Municipalidad de Lima", 0, 1, "L");
         
    }

    //Order
    function writePage($orderid) {
             $dv = null;

    $q = "select PLACA, NOMBRE_MODALIDAD_SERVICIO, NOMBRE_CLASE_VEHICULO, ANO_FABRICACION, NOMBRE_MODELO, NOMBRE_MARCA , NUMERO_SERIE, NUMERO_SERIE_MOTOR, NOMBRE_TIPO_COMBUSTIBLE, PESO_SECO, PESO_BRUTO, LONGITUD, ALTURA, ANCHO, CARGA_UTIL, CAPACIDAD_PASAJERO, NUMERO_ASIENTO, NUMERO_RUEDA, NUMERO_EJE, NUMERO_PUERTA, FECHA_INSCRIPCION_VEHICULO, NOMBRE_TIPO_DOCUMENTO, DOCUMENTO, PROPIETARIO   from directorio_vehiculo where PLACA = '" . $orderid . "'";
    $r = mysql_query($q);
    if (mysql_num_rows($r) > 0) {
        $dv = mysql_fetch_array($r);
        if ($dv['NOMBRE_MARCA'] != '' && $dv['NOMBRE_MODELO'] != '' && $dv['ANO_FABRICACION'] != '') {
            #$vehiculosReferenciales = obtenerReferenciaAutos($dv['NOMBRE_MARCA'], $dv['NOMBRE_MODELO'], $dv['ANO_FABRICACION']);
        }
    }
    
             $this->AddPage();
             $this->SetTextColor(0, 0, 0);
             $this->SetFont('Arial', '', 8);
             $this->Line(80, 43, 80, 258);             
             $this->Line(10, 90, 80, 90);
             $this->Image('check.jpg',10,42,20);
             $this->Image('check.jpg',33,42,20);
             $this->Image('check.jpg',56,42,20);
             
             $this->SetY(70);
             $this->SetFont('Arial', '', 15);
             $this->Cell(20, 5.5, "1", 0, 0, "C");
             $this->Cell(22, 5.5, "0", 0, 0, "C");
             $this->Cell(25, 5.5, "0", 0, 1, "C");
             $this->SetFont('Arial', '', 10);
             $this->Cell(20, 5.5, "Dueno", 0, 0, "C");
             $this->Cell(22, 5.5, "Infracciones", 0, 0, "C");
             $this->Cell(25, 5.5, "Impuestos", 0, 1, "C");
             
             $this->SetY(40);
             $this->SetX(90);
             $this->SetFont('Arial', 'B', 18);
             $this->Cell(110, 5.5, "Especificaciones:", 0, 1, "R");
             $this->SetFont('Arial', 'B', 14);
             //Clase: AUTOMOVIL 	Año de Fabricación: 1995
             $this->ln(5);
             $this->Cell(90, 5.5, "Clase:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NOMBRE_CLASE_VEHICULO'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(40, 5.5, "Fecha Fab:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['ANO_FABRICACION'], 0, 1, "L");
             $this->ln(5);
             $this->Cell(90, 5.5, "Marca:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NOMBRE_MARCA'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(40, 5.5, "Modelo:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5,  $dv['NOMBRE_MODELO'], 0, 1, "L");
             $this->ln(5);
             $this->Cell(95, 5.5, "# Serie:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NUMERO_SERIE'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(35, 5.5, "# Motor:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NUMERO_SERIE_MOTOR'], 0, 1, "L");
             
             $this->ln(5);
             $this->Cell(105, 5.5, "Combustible:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NOMBRE_TIPO_COMBUSTIBLE'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(25, 5.5, "Puertas:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NUMERO_PUERTA'], 0, 1, "L");
             
              $this->ln(5);
             $this->Cell(100, 5.5, "Peso Bruto:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['PESO_SECO'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(30, 5.5, "Peso Seco:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['PESO_BRUTO'], 0, 1, "L");
             
             
              $this->ln(5);
             $this->Cell(100, 5.5, "Longitud:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['LONGITUD'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(30, 5.5, "Altura:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['ALTURA'], 0, 1, "L");
             
              $this->ln(5);
             $this->Cell(100, 5.5, "Ancho:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['ALTURA'], 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(30, 5.5, "Carga Util:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['CARGA_UTIL'], 0, 1, "L");
             
              $this->ln(5);
             $this->Cell(100, 5.5, "Pasajeros:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['CAPACIDAD_PASAJERO'] , 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(30, 5.5, "Asientos:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NUMERO_ASIENTO'], 0, 1, "L");
             
             
               $this->ln(5);
             $this->Cell(100, 5.5, "Ruedas:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5, $dv['NUMERO_RUEDA'] , 0, 0, "L");
             $this->SetFont('Arial', 'B', 14);
             $this->Cell(30, 5.5, "Ejes:", 0, 0, "R");
             $this->SetFont('Arial', '', 14);
             $this->Cell(40, 5.5,  $dv['NUMERO_EJE'], 0, 1, "L");
             
             //$this->Line(70, 10, 70,50);
            // texto
            // firma y fecha
       
    }

}

  

//Instanciation of inherited class 
    $pdf = new PDF("P", "mm", "Letter");
    //if ($_POST['compress']) {
    //    $pdf->SetCompression(true);
    //}
    $pdf->Open();
    $pdf->AliasNbPages();
    $pdf->SetDisplayMode("fullpage");
    
    //if (!$_POST['compress']) {
        $pdf->AddFont('Verdana', '', 'verdana.php');
        $pdf->AddFont('Verdana', 'I', 'verdanaI.php');
        $pdf->AddFont('Verdana', 'B', 'verdanaB.php');
    //}
    
         //for ($w = 0; $w < 4; $w++) {
        $pdf->writePage($_GET['keyPlaca']);
        //}
     

    // SALIDA
    $nombre_del_pdf = "verifictodo.com_Placa-" . $_GET['keyPlaca'] . ".pdf";
    $pdf->Output($nombre_del_pdf, true);
    exit;
 
?>