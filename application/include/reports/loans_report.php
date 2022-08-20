<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//include connection file
// include_once("connection.php");

include_once('fpdf184/fpdf.php');
include_once('../../../config/connect.php');


$reportType = mysqli_real_escape_string($link, $_POST['reportType']);
$from = mysqli_real_escape_string($link, $_POST['from']);
$to = mysqli_real_escape_string($link, $_POST['to']);

$companyHeader = mysqli_query($link, "SELECT * FROM systemset;");

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


    foreach($companyHeader as $item){
    $this->Cell(0,0, $item['name'],0,1,'C');
    }
    $this->Ln(10);
    $this->Cell(0,0,'Pending Loans',0,1,'C');
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
$display_heading = array('Borrower ID'=>'Borrower ID', 'Borrower'=>'Borrower', 'Loan ID'=> 'Loan ID', 'Interest Rate'=> 'Interest Rate', 'Amount'=> 'Amount', 'Balance'=> 'Balance', 'Application Date'=> 'Application Date');


$result = mysqli_query($link, "SELECT l.borrowerId as 'Borrower ID', b.fname as 'Borrower', l.loanId as 'Loan ID', l.interestRate as 'Interest Rate', l.amountApproved as 'Amount', l.loanBalance as 'Balance', l.applicationDate as 'Application Date' from loans as l inner join borrowers as b on l.borrowerId = b.id inner join calculation_method as c on l.calculationMethod = c.methodId where l.status = ".$reportType." and l.applicationDate between '".$from."' and '".$to."';") or die("database error:". mysqli_error($link));
$header = mysqli_query($link, "SHOW columns FROM loans");
 
$pdf = new PDF('L','mm','A4');

//header
$pdf->AddPage();

//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor (200, 255, 160);

foreach($display_heading as $heading) {
    if($heading == 'Borrower ID' || $heading == 'Interest Rate'){
        $pdf->Cell(30,12,$display_heading[$heading],1,0,'',true);
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
    }else{
        $pdf->Cell(42,12,$column,1);
    } 
}
}
$pdf->Output();
?>
