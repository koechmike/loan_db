<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//include connection file
// include_once("connection.php");

include_once('fpdf184/fpdf.php');
include_once('../../../config/connect.php');

$companyHeader = mysqli_query($link, "SELECT * FROM loan.systemset;");

if(isset($_POST['borrowersReport'])){
    $borrowerType = mysqli_real_escape_string($link, $_POST['borrowerType']);
    if($borrowerType == 0){
        $title = "Active Borrowers";
        $result = mysqli_query($link, "SELECT id as 'Borrower ID', fname as 'First Name', lname as 'Last Name', phone as 'Phone', email as'Email', date_time as 'Date of Reg.' FROM loan.borrowers;") or die("database error:". mysqli_error($link));
    }else{
        $title = "Borrowers With Active Loans";
        $result = mysqli_query($link, "SELECT id as 'Borrower ID', fname as 'First Name', lname as 'Last Name', phone as 'Phone', email as'Email', date_time as 'Date of Reg.' FROM loan.borrowers inner join loans on id = borrowerId where loans.status != 6 or loans.status < 2;") or die("database error:". mysqli_error($link));
    }
}elseif(isset($_POST['newBorrower'])){
    $from = mysqli_real_escape_string($link, $_POST['from']);
    $to = mysqli_real_escape_string($link, $_POST['to']);
    $title = "New Borrowers from ".$from." to ".$to.".";
    $result = mysqli_query($link, "SELECT id as 'Borrower ID', fname as 'First Name', lname as 'Last Name', phone as 'Phone', email as'Email', date_time as 'Date of Reg.' FROM loan.borrowers where date_time between '".$from."' and '".$to."';") or die("database error:". mysqli_error($link));
}

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../../img/ass.png',135,10,20);
    $this->SetFont('Arial','B',16);
    // Move to the right
    $this->Ln(30);
    // Title
    //Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
    global $companyHeader;
    global $title;

    foreach($companyHeader as $item){
    $this->Cell(0,0, $item['name'],0,1,'C');
    }
    $this->Ln(10);
    $this->Cell(0,0,$title,0,1,'C');
    // Line break
    $this->Ln(10);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// $db = new dbObj();
// $connString =  $db->getConnstring();
$display_heading = array('Borrower ID'=>'Borrower ID', 'First Name'=>'First Name', 'Last Name'=> 'Last Name', 'Phone'=> 'Phone', 'Email'=> 'Email', 'Date of Reg.'=> 'Date of Reg.');


$header = mysqli_query($link, "SHOW columns FROM loans");
 
$pdf = new PDF('L','mm','A4');

//header
$pdf->AddPage();

//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor (200, 255, 160);

foreach($display_heading as $heading) {
    if($heading == 'Borrower ID' || $heading == 'Phone'){
        $pdf->Cell(30,12,$display_heading[$heading],1,0,'',true);
    }elseif($heading == 'Email'){
        $pdf->Cell(50,12,$display_heading[$heading],1,0,'',true);   
    }else{
        $pdf->Cell(42,12,$display_heading[$heading],1,0,'',true);
    }
}

$pdf->SetFont('Arial','',12);

foreach($result as $row) {
$pdf->Ln();
$counter = 0;
foreach($row as $column){
    $counter++;
    if($counter == 1 || $counter == 4){
        $pdf->Cell(30,12,$column,1);
    }elseif($counter == 5){
        $pdf->Cell(50,12,$column,1);  
    }else{
        $pdf->Cell(42,12,$column,1);
    } 
}
}
$pdf->Output();
?>
