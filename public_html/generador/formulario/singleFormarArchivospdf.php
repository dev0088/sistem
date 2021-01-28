<?php 
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");    

    if( (isset($_SESSION['logged_in']['active_employee_id'])) && (count($_GET) < 1) )
    {
        header('Location: home.php');
        exit();
    }
    else{
        // include_once("../../pdf/fpdf.php");
        class PDF extends FPDF
        {
            function Header($data, $no, $id, $headern)
            {
                $this->SetFont('Arial','B',12);
                if($data!=''){
                    $this->Cell(190,7,'Generador ID: '.$id,0,1);
                    $this->Cell(190,7,'Client Name: '.$data,0,1);
                    $this->Cell(190,7,'CRS No: '.$no,0,1);
                    
                }
               /// $this->Ln();
                
                
            }
            
            

            function Footer()
            {
                $this->SetY(-15);
                // Select Arial italic 8
                $this->SetFont('Arial','I',8);
                // $this->Cell(10,6,date('Y-m-d H:i:s'),0,1,L);
                // $this->Cell(10,6,'Page '.$this->PageNo().'/{nb}',0,0,'R');
                $this->Cell(173,6,date('Y-m-d H:i:s'),'0',0,'L',false);
                $this->Cell(18,6, 'Page '.$this->PageNo().'/{nb}','0',0,'L',false);
                $this->Ln();
            }
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
            
            
            function myCell($w, $h, $x, $t, $price_item){
                $height = $h/2;
                $first = $height+2;
                $second = $height+$height+$height+3;
                $len = strlen($t);
                if($len>40){
                    $txt = str_split($t,40);
                    $this->SetX($x);
                    $this->Cell($w,$first,$txt[0],0,0,'C');
                    $this->SetX($x);
                    $this->Cell($w,$second,$txt[1],0,0,'C');
                    $this->SetX($x);
                    $this->Cell($w,$h,'',1,0,'C');
                }else{
                    $this->SetX($x);
                    if($price_item == 5 || $price_item == 6){
                        $this->Cell($w,$h,$t.'   ',1,0,'R');
                    } else {                    
                        $this->Cell($w,$h,$t,1,0,'C');
                    }
                }
            }

            // Better table
            function ImprovedTable($header, $data)
            {
                // Column widths
                $w = array(70, 0.01, 100, 20, 20, 30, 35);
                // Header
                for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],10,$header[$i],1,0,'C');
                $this->Ln();
                // Data
                
                foreach($data as $row)
                {
                    $j=0;
                    $des='';
                    foreach($row as $col){
                        $x = $this->GetX($x);
                        if($j == 1){
                            $des = $col;
                        } else {
                            if (($j==5) || ($j==6)){
                                $col = '$'.number_format($col, 2);
                            }
                            if (($j == 2) && ($des!='')){
                                $col = $col.' - '.$des;
                            }
                            $this->myCell($w[$j],10,$x,$col,$j);
                        }
                        // $this->Cell($w[$j],12,$col,1,0,'C');
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
        
           

        $id = $_GET['id'];
        $crs = $_GET['crsno'];



        //include("process-index.php");
        //include("content-index.php");
        $display_headings = array('pmc quantity of people' => 'pmc_quantity_of_people','pmc hours' => 'pmc_hours');
//         $empRes     = $conn->query("select  name, subcategory_name, pmc_quantity_of_people, pmc_hours, pmc_cost,
// pmtot_cost from categories c inner join subcategories s on
// c.id = s.Categories inner join labor l on 
// l.subcategory = s.id
// where l.id = $id
// ;");
$headern = $conn->query("SELECT `category`,SUM(`pmtot_cost`)
FROM `labor`     
where id_customer = $id and crsno = $crs
GROUP BY `category` ;");

//	$resultdata =  $headern->fetch_row();
	
// 	while ($row = $headern -> fetch_row()) {
// //printf ("%s (%s)\n", $row[0], $row[1]);
//   $this->Cell(190,7,'CRS No: '.$row[0],0,1);
//   $this->Cell(190,7,'CRS No: '.$row[1],0,1);
// }
// 	foreach($resultdata as $values){
// 	    echo $values.category;
// 	    echo '<br>';
	    
// 	}
	
	//die();
	


        $empRes     = $conn->query("select name, description, subcategory_name, pmc_quantity_of_people, pmc_hours, pmc_cost, pmtot_cost from categories c 
inner join subcategories s on c.id = s.Categories 
inner join labor l on l.subcategory = s.id
where l.id_customer = $id and l.crsno = $crs;");
        $empName    = $conn->query("select nombre from clientes c inner join labor l on l.id_customer = c.id where l.id_customer = $id;");
        $empName1     = $empName->fetch_assoc();
        $empRes1     = $conn->query("SELECT SUM(pmtot_cost) as alltotal from labor where id_customer = $id and crsno = $crs");
        $empRow1     = $empRes1->fetch_assoc();
        
        
        $empRes2     = $conn->query("SELECT SUM(pmtot_cost) as own_sub_total from labor where id_customer = $id and crsno = $crs and (category='1' or category='2') ");
        $empRow2     = $empRes2->fetch_assoc();
        $Toolstotal = (($empRow2['own_sub_total']/100)*5);
        
        
        $empRes3    = $conn->query("SELECT SUM(pmtot_cost) as own_sub_total from labor where id_customer = $id and crsno = $crs and (category='1' or category='2') ");
        $empRow3     = $empRes3->fetch_assoc();
        $Consumablestotal = (($empRow3['own_sub_total']/100)*2);
        
        
        
        $header     = $conn->query("SELECT colmns from labor where field =='pmc_quantity_of_people' and field =='pmc_hours'");
        $empRow     = $empRes->fetch_assoc();
        $empCRS     = $conn->query("select l.id, name, crsno from categories c 
inner join subcategories s on c.id = s.Categories 
inner join labor l on l.subcategory = s.id
where l.id_customer = $id and l.crsno = $crs;");
        // foreach($header as $heading){
        //     $display_headings[$heading['Field']];
        // }
        $empcrs = $empCRS->fetch_assoc();
    
//         echo($empRow1['alltotal']);
// print_r($empcrs['crsno']);die();
        
    //  print_r($empRow);

        $pdf = new PDF("L", "mm", "A4");
        // Column headings
        $header = array('Category', '', 'Sub-category', 'Quantity', 'Hours', 'Price', 'Subtotal');
        $pdf->SetFont('Arial','',10);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        $pdf->Header($empName1['nombre'], $empcrs['crsno'], $empcrs['id'], $headern);
         $pdf->SetFont('Arial','',11);
         $pdf->Cell(70,7,'Category' ,1,0,'C');
            $pdf->Cell(30,7,'Subtotal',1,1,'C');   
            
        	while ($row = $headern -> fetch_row()) {
            $heade = $conn->query("SELECT `name` FROM `categories` where id = $row[0]");
             $empcq = $heade->fetch_assoc();
            $pdf->Cell(70,7,$empcq['name'] ,1,0,'L');
           // $pdf->Cell(30,7,'$'.$row[1],1,1,'R');  
           
             $pdf->Cell(30,7,'$'.number_format($row[1], 2),1,1,'R',$fill);
        	}
        	
        	 $pdf->Cell(70,7,'TOTAL' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($empRow1['alltotal'], 2),1,1,'R');  
        	
	$pdf->Ln();
	 $getsubtotal = ($Toolstotal)+($Consumablestotal)+($empRow1['alltotal']);
        	 $pdf->Cell(70,7,'Tools' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($Toolstotal, 2),1,1,'R');   
        	 $pdf->Cell(70,7,'Consumables' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($Consumablestotal, 2),1,1,'R');    
        	 $pdf->Cell(70,7,'TOTAL' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($getsubtotal, 2),1,1,'R');
            
            
 
        	
	$pdf->Ln();
	 $getsubtotal11 = $getsubtotal*0.01;
	 
	 $addsubtotal = ($getsubtotal11+$getsubtotal)*0.025;
	 
	 
	 $subtotalinc = $getsubtotal+$getsubtotal11+$addsubtotal;
	 
        	 $pdf->Cell(70,7,'Insurance' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($getsubtotal11, 2),1,1,'R');   
        	 $pdf->Cell(70,7,'Comission' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($addsubtotal, 2),1,1,'R');    
        	 $pdf->Cell(70,7,'TOTAL' ,1,0,'L');
            $pdf->Cell(30,7,'$'.number_format($subtotalinc, 2),1,1,'R');
                       
            
        	
        	$pdf->Ln();
       // $pdf->SetFont('Arial','',11);
        $pdf->ImprovedTable($header,$empRes);
        $pdf->Ln();
        $pdf->Cell(210,10,"",1,0,'R',false);
        $pdf->Cell(30,10,"TOTAL",1,0,'C',false);
        $pdf->Cell(35,10, '$'.number_format($empRow1['alltotal'], 2).'   ',1,0,'R',false);
        $pdf->Ln();
        ob_end_clean();
        $pdf->Output();

    }
?>  