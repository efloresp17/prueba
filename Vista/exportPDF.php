<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/vista/pdf/fpdf.php';

$fecha = date("d-m-Y H:i:s");
$tipo = $_GET["tipoUsuario"];

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);
date_default_timezone_set('America/Bogota');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('master/assets/images/logo.png',10,8,50);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,50,'User table',0,1,'C');
    // Salto de línea
    //$this->Ln(5);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',12);

    $this->Cell(0,10,'Manigua Library - Date '.date("d/m/y").' - Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

if ($tipo == 1) {

    $pdf->cell(18);
    $pdf->Cell(20,10,'User code',1);
    $pdf->Cell(30,10,'User type',1);
    $pdf->Cell(75,10,'User name',1);
    $pdf->Cell(30,10,'User status',1);
    
    $pdf->Ln();

    $user = ManejoUser::getUserListByType(3); //3 code for the admins
    for ($i=0; $i < count($user); $i++) { 
        $pdf->SetTextColor(10,10,10);

        $pdf->cell(18);
        $pdf->Cell(20,10, $user[$i]->getCod_usuario(),1);
        $pdf->Cell(30,10, 'ADMIN',1);
        $pdf->Cell(75,10, $user[$i]->getNombre(),1);
        
        if($user[$i]->getEstado() == 1){

           $pdf->Cell(30,10,"WAITING",1); 
        } else if($user[$i]->getEstado() == 2){
           
            $pdf->Cell(30,10,"REJECTED",1);
        } else if($user[$i]->getEstado() == 3){
           
            $pdf->Cell(30,10,"ACTIVATED",1); 
        } else if($user[$i]->getEstado() == 4){
           
            $pdf->Cell(30,10,"DESACTIVATED",1); 
        } 
         $pdf->Ln();
    }
    $pdf->Output();

}

else if ($tipo == 2) {
    
    $pdf->cell(30);
    $pdf->Cell(20,10,'User code',1);
    $pdf->Cell(30,10,'User type',1);
    $pdf->Cell(45,10,'User name',1);
    $pdf->Cell(30,10,'User status',1);
    $pdf->Ln();

    $user = ManejoUser::getUserListByType(4); //3 code for the admins
    for ($i=0; $i < count($user); $i++) { 

        $pdf->cell(30);
        $pdf->Cell(20,10, $user[$i]->getCod_usuario(),1);
        $pdf->Cell(30,10, 'READER',1);
        $pdf->Cell(45,10, $user[$i]->getNombre(),1);
        
        if($user[$i]->getEstado() == 1){

           $pdf->Cell(30,10,"WAITING",1); 
        } else if($user[$i]->getEstado() == 2){
           
            $pdf->Cell(30,10,"REJECTED",1);
        } else if($user[$i]->getEstado() == 3){
           
            $pdf->Cell(30,10,"ACTIVATED",1); 
        } else if($user[$i]->getEstado() == 4){
           
            $pdf->Cell(30,10,"DESACTIVATED",1); 
        } 
         $pdf->Ln();
    }
    $pdf->Output();

}else if ($tipo == 3) {
    
    $pdf->cell(30);
    $pdf->Cell(20,10,'User code',1);
    $pdf->Cell(30,10,'User type',1);
    $pdf->Cell(45,10,'User name',1);
    $pdf->Cell(30,10,'User status',1);
    $pdf->Ln();

    $user = ManejoUser::getUserListByType(1); //3 code for the admins
    for ($i=0; $i < count($user); $i++) { 

        $pdf->cell(30);
        $pdf->Cell(20,10, $user[$i]->getCod_usuario(),1);
        $pdf->Cell(30,10, 'CLIENT',1);
        $pdf->Cell(45,10, $user[$i]->getNombre(),1);
        
        if($user[$i]->getEstado() == 1){

           $pdf->Cell(30,10,"WAITING",1); 
        } else if($user[$i]->getEstado() == 2){
           
            $pdf->Cell(30,10,"REJECTED",1);
        } else if($user[$i]->getEstado() == 3){
           
            $pdf->Cell(30,10,"ACTIVATED",1); 
        } else if($user[$i]->getEstado() == 4){
           
            $pdf->Cell(30,10,"DESACTIVATED",1); 
        } 
         $pdf->Ln();
    }
    $pdf->Output();

}else if ($tipo == 4) {
    
    $pdf->cell(30);
    $pdf->Cell(20,10,'User code',1);
    $pdf->Cell(30,10,'User type',1);
    $pdf->Cell(45,10,'User name',1);
    $pdf->Cell(30,10,'User status',1);
    $pdf->Ln();

    $user = ManejoUser::getUserListByType(5); //3 code for the admins
    for ($i=0; $i < count($user); $i++) { 

        $pdf->cell(30);
        $pdf->Cell(20,10, $user[$i]->getCod_usuario(),1);
        $pdf->Cell(30,10, 'AUTHOR',1);
        $pdf->Cell(45,10, $user[$i]->getNombre(),1);
        
        if($user[$i]->getEstado() == 1){

           $pdf->Cell(30,10,"WAITING",1); 
        } else if($user[$i]->getEstado() == 2){
           
            $pdf->Cell(30,10,"REJECTED",1);
        } else if($user[$i]->getEstado() == 3){
           
            $pdf->Cell(30,10,"ACTIVATED",1); 
        } else if($user[$i]->getEstado() == 4){
           
            $pdf->Cell(30,10,"DESACTIVATED",1); 
        } 
         $pdf->Ln();
    }
    $pdf->Output();

}else if ($tipo == 5) {
    
    $pdf->cell(30);
    $pdf->Cell(20,10,'User code',1);
    $pdf->Cell(30,10,'User type',1);
    $pdf->Cell(45,10,'User name',1);
    $pdf->Cell(30,10,'User status',1);
    $pdf->Ln();

    $user = ManejoUser::getUserListByType(6); //3 code for the admins
    for ($i=0; $i < count($user); $i++) { 

        $pdf->cell(30);
        $pdf->Cell(20,10, $user[$i]->getCod_usuario(),1);
        $pdf->Cell(30,10, 'EDITORIAL',1);
        $pdf->Cell(45,10, $user[$i]->getNombre(),1);
        
        if($user[$i]->getEstado() == 1){

           $pdf->Cell(30,10,"WAITING",1); 
        } else if($user[$i]->getEstado() == 2){
           
            $pdf->Cell(30,10,"REJECTED",1);
        } else if($user[$i]->getEstado() == 3){
           
            $pdf->Cell(30,10,"ACTIVATED",1); 
        } else if($user[$i]->getEstado() == 4){
           
            $pdf->Cell(30,10,"DESACTIVATED",1); 
        } 
         $pdf->Ln();
    }
    $pdf->Output();

}else{
    echo '<script>
    window.location="Admin.php?menu=index";
    </script>';
}

?>