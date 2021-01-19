<?php 
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
    
 
    if(isset($_SESSION['logged_in']['active_employee_id']) && count($_GET) < 1)
    {
        header('Location: home.php');
        exit();
    }
    else
    {
        include("../pdf/fpdf.php");
        //include("process-index.php");
        //include("content-index.php");
        $display_headings = array('pmc quantity of people' => 'pmc_quantity_of_people','pmc hours' => 'pmc_hours',);
        $empRes     = $conn->query("select  name, subcategory_name, pmc_quantity_of_people, pmc_hours, pmc_cost,
pmtot_cost from categories c inner join subcategories s on
c.id = s.Categories inner join labor l on 
l.subcategory = s.id;");
        $header     = $conn->query("SELECT colmns from labor where field =='pmc_quantity_of_people' and field =='pmc_hours'");
        $empRow     = $empRes->fetch_assoc();
        foreach($header as $heading){
                $display_headings[$heading['Field']];
        }
    
    
    $display_headings1 = array('pmtot_cost' => 'pmtot_cost',);
        $empRes1     = $conn->query("SELECT SUM(pmtot_cost) as alltotal from labor");
        $header     = $conn->query("SELECT colmns from labor where field =='pmtot_cost' ");
        $empRow1     = $empRes1->fetch_assoc();
        foreach($header as $heading){
                $display_headings[$heading['Field']];
        }
        
//         echo($empRow1['alltotal']);
// die();
        
    //  print_r($empRow);
class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(20,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(20,6,$col,1);
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(75, 50, 15, 15, 18, 18);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    
    foreach($data as $row)
    {
        $j=0;
        foreach($row as $col){
            $this->Cell($w[$j],6,$col,1);
            $j++;
        }
        // $this->Cell($w[0],6,$col,'LR');
        // $this->Cell($w[1],6,$col,'LR');
        // $this->Cell($w[2],6,number_format($col),'LR',0,'R');
        // $this->Cell($w[3],6,number_format($col),'LR',0,'R');
        // $this->Cell($w[4],6,number_format($col),'LR',0,'R');
        // $this->Cell($w[5],6,number_format($col),'LR',0,'R');
        $this->Ln();
        
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

// require_once("dbcontroller.php");
// $db_handle = new DBController();
// $result = $db_handle->runQuery("SELECT * FROM toy");
// $header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
// FROM `INFORMATION_SCHEMA`.`COLUMNS` 
// WHERE `TABLE_SCHEMA`='blog_samples' 
//     AND `TABLE_NAME`='toy'");

// require('fpdf/fpdf.php');
// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',12);      
// foreach($header as $heading) {
//     foreach($heading as $column_heading)
//         $pdf->Cell(90,12,$column_heading,1);
// }
// foreach($result as $row) {
//     $pdf->SetFont('Arial','',12);   
//     $pdf->Ln();
//     foreach($row as $column)
//         $pdf->Cell(90,12,$column,1);
// }
// $pdf->Output();



$pdf = new PDF();
// Column headings
$header = array('Category', 'Sub-category', 'People', 'Hours', 'Price', 'Total');
// Data loading
// $data = $pdf->LoadData('data.txt');
// print_r($empRes);die();
$pdf->SetFont('Arial','',11);
$pdf->AddPage();
$pdf->ImprovedTable($header,$empRes);
$pdf->Ln();
// $pdf->Cell(176, 10, 'A Computer Science Portal for geek!', 0, 0, 'C');
// $pdf->Ln();
$pdf->Cell(190,6,number_format($empRow1['alltotal']),'LR',0,'R',false);

// $pdf->ImprovedTable($header,$empRes1);

/*$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
*/
$pdf->Output();


    }
?>  