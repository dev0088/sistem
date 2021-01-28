<?php 
// echo "string";die();
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
	if(isset($_SESSION['logged_in']['active_employee_id']) && count($_GET) < 1)
	{
        header('Location: home.php');
        exit();
	}
	else
	{
	$crs_no = '';
	$html = '';
	$total=0;
    $customer_id = $_POST["customer_id"];
    $crsno = $_POST["crsno"];
    $rowid = $_POST["rowid"];


 $sql_delete= "DELETE FROM labor WHERE id_customer=$customer_id and id = $rowid ";
 $result1 = mysqli_query($conn,$sql_delete);

 $sql= "select l.id as lidd, name, subcategory_name, pmc_quantity_of_people, crsno, pmc_hours, pmc_cost, pmtot_cost, created_at from categories c 
inner join subcategories s on c.id = s.Categories 
inner join labor l on l.subcategory = s.id
where l.id_customer = $customer_id and l.crsno = $crsno";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        
        $html .= '<table id="datatable_fixed_column" class="table table-striped table-bordered dataTable" width="100%"><thead><tr class="header-cols-labels"><th class="text-center">Category</th><th class="text-center">Sub-Category</th><th class="text-center">Number of People</th><th class="text-center">Number of Hours</th><th class="text-center">Price</th><th class="text-center">Subtotal</th><th class="text-center">Action</th></tr></thead><tbody>';
       while($row = mysqli_fetch_array($result)) {
           $crs_no = $row['crsno'];
           $html .= '<tr id="'.$row['lidd'].'" class="employee-row" data-row="{"id":"'.$row['id'].'","name":"'.$row['name'].'","subcategory_name":"'.$row['subcategory_name'].'","pmc_quantity_of_people":"'.$row['pmc_quantity_of_people'].'","crsno":"'.$row['crsno'].'","pmc_hours":"'.$row['pmc_hours'].'","pmc_cost":"'.$row['pmc_cost'].'","pmtot_cost":"'.$row['pmtot_cost'].'","created_at":"'.$row['created_at'].'"}" data-employee-id="'.$row['id'].'"><td class="text-center">'.$row['name'].'</td><td class="text-center">'.$row['subcategory_name'].'</td><td class="text-center">'.$row['pmc_quantity_of_people'].'</td><td class="text-center">'.$row['pmc_hours'].'</td><td class="text-center">'.number_format($row['pmc_cost'],2).'</td><td class="text-center">'.number_format($row['pmtot_cost'],2).'</td><td><button class="btn btn-sm btn-info" onclick="deleterow('.$customer_id.','.$crsno.','.$row['lidd'].');">Delete </button></td></tr>';
          $total+= $row['pmtot_cost'];
       }
       $html.='<tr><td></td><td></td><td></td><td></td><td class="text-center">Total</td><td class="text-center">'.number_format($total,2).'</td></tr></tbody></table><div class="dt-toolbar-footer"><div class="col-sm-4 col-xs-12 hidden-xs"></div><div class="col-sm-6 col-xs-12"><a target="_blank" class="btn btn-success btn-sm update" href="http://173.237.185.182/~sistemam3/generador/formulario/singleFormarArchivospdf.php?id='.$customer_id.'&crsno='.$crsno.'"><i class="fa fa-file-pdf-o"></i> Generar archivo</a><a class="btn btn-primary btn-sm update" href="http://173.237.185.182/~sistemam3/generador/formulario/formar-archivos.php"><i class="fa fa-file-pdf-o"></i> Regresar</a></div><div class="col-xs-12 col-sm-12"></div></div>';
    }
    $data = array('crs_no' => $crs_no, 'html' => $html);
    print_r(json_encode($data));
	}
?>
