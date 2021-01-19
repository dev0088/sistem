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
	    $display_headings =	array('pmc quantity of people' => 'pmc_quantity_of_people','pmc_working_days' => 'pmc working days','pmc hours' => 'pmc_hours',);
		$empRes 	= $conn->query("SELECT pmc_quantity_of_people,pmc_working_days,pmc_hours FROM labor WHERE id = '64' and id_customer = '17'");
		$header 	= $conn->query("SELECT colmns from labor where field =='pmc_quantity_of_people' and field =='pmc_working_days' and field =='pmc_hours'");
		$empRow 	= $empRes->fetch_assoc();
		foreach($header as $heading){
		    	$display_headings[$heading['Field']];
		}
	//
	//	print_r($empRow);
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
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
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

$pdf = new PDF();
// Column headings
$header = array('Categoria', 'Campo', 'Valor', 'Subtotal');
// Data loading
$data = $pdf->LoadData('data.txt');

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
/*$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
*/
$pdf->Output();


	}
?>  